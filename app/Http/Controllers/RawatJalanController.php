<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawatJalan;
use App\Models\Booking;
use App\Models\KomfirmasiPembayaran;
use App\Models\Obat;
use App\Models\RawatJalanObat;
use App\Models\RawatJalanDiagnosa;
use Carbon\Carbon;
use Auth;
use DB;



class RawatJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
        $rawatJalan = RawatJalan::latest()->where('status', 'success')->whereDate('tanggal', Carbon::today())->get();
        $diagnosaHariIni = RawatJalanDiagnosa::latest()->whereDate('created_at', Carbon::today())
    ->orWhereDate('updated_at', Carbon::today())
    ->with('obats')
    ->get();


        return view('admin.rawat_jalan.index', compact('rawatJalan', 'bookings_countApp', 'pembayarans_countApp', 'diagnosaHariIni'));

    }

    public function indexKartuRekamMedis()
    {
        // Hitung data lainnya
        $bookings_countApp = Booking::where('status', 'pending')
            ->whereDate('tanggal', Carbon::today())
            ->count();
    
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
    
        // Mengambil data Rawat Jalan berdasarkan `cek_anamnesa`
    $rawatJalan = RawatJalan::where('cek_anamnesa', 'approve_anamnesa') // Pastikan anamnesa selesai
    ->with(['diagnosa', 'diagnosa.obat', 'user']) // Memuat relasi diagnosa, obat, dan user
    ->latest()
    ->get();

// Mengambil diagnosa hari ini
$diagnosaHariIni = RawatJalanDiagnosa::with(['rawatJalan', 'obat.obat'])->latest()->get();

// Gabungkan data ke dalam satu variabel
$kartuRekamMedis = compact('rawatJalan', 'diagnosaHariIni');

// Debug data (opsional)
// dd($rawatJalan);
    
        // Return ke view
        return view('admin.rawat_jalan.indexKartuRekamMedis', compact(
            'rawatJalan',
            'bookings_countApp',
            'pembayarans_countApp',
            'diagnosaHariIni',
            'kartuRekamMedis'
        ));
    }
    

    

    
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function create()
//     {
//         
//     }

    

    


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    {

    
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rawatJalan_edit = RawatJalan::findOrFail($id);
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.rawat_jalan.createAnamnesa', compact('rawatJalan_edit', 'bookings_countApp', 'pembayarans_countApp'));

    }

    public function editDiagnosa($id)
    {
        // Ambil data diagnosa berdasarkan ID Rawat Jalan
    $rawatJalanDiagnosa = RawatJalanDiagnosa::with(['obat','rawatJalanObat', 'booking', 'user'])->findOrFail($id);

    // Ambil data obat yang tersedia
    $obatDiagnosa = Obat::latest()->get();

    // Ambil jumlah pending bookings dan pembayaran untuk tampilan
    $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
    $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.rawat_jalan.createDiagnosa', compact('obatDiagnosa','rawatJalanDiagnosa', 'bookings_countApp', 'pembayarans_countApp'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        // Validasi input dari form
        $request->validate([
            'tensi' => 'required|min:1',
            'gula_darah' => 'required|min:1',
            'asam_urat' => 'required|min:1',
            'kolesterol' => 'required|min:1',
            'cek_anamnesa' => 'required',
        ]);

        // Temukan data berdasarkan ID atau tampilkan error jika tidak ditemukan
        $rawatJalan = RawatJalan::findOrFail($id);

        // Update data dari form request
        $rawatJalan->update([
            'tensi' => $request->input('tensi'),
            'gula_darah' => $request->input('gula_darah'),
            'asam_urat' => $request->input('asam_urat'),
            'kolesterol' => $request->input('kolesterol'),
            'cek_anamnesa' => $request->has('cek_anamnesa') ? 'approve_anamnesa' : null,
        ]);

        // Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('rawatJalan.index')
                         ->with('success', 'Data Anamnesa berhasil diperbarui.');
        

    }


    public function updateDiagnosa(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'obatIds' => 'required|array|min:1',
            'obatIds.*' => 'exists:obats,id', // Pastikan setiap ID ada di tabel obats
            'jumlahs' => 'required|array|min:1',
            'jumlahs.*' => 'integer|min:1', // Pastikan setiap jumlah adalah integer positif
            'booking_id' => 'required|integer|exists:bookings,id',
            'user_id' => 'required|integer|exists:users,id',
            'penyakit' => 'required|string',
        ]);
    
        DB::beginTransaction();
        try {
            // Ambil data RawatJalanDiagnosa
            $rawatJalanDiagnosa = RawatJalanDiagnosa::findOrFail($id);
    
            // Update diagnosa rawat jalan
            $rawatJalanDiagnosa->update([
                'booking_id' => $request->booking_id,
                'user_id' => $request->user_id,
                'penyakit' => $request->penyakit,
            ]);
    
            // Hapus data obat sebelumnya
            RawatJalanObat::where('rawat_jalan_diagnosa_id', $rawatJalanDiagnosa->id)->delete();
    
            // Ambil data obat yang dibutuhkan sekaligus
            $obatIds = $request->obatIds;
            $jumlahs = $request->jumlahs;
            $obats = Obat::whereIn('id', $obatIds)->lockForUpdate()->get();
    
            foreach ($obatIds as $index => $obatId) {
                $jumlah = $jumlahs[$index];
    
                // Cari obat berdasarkan ID
                $obat = $obats->firstWhere('id', $obatId);
    
                if (!$obat) {
                    throw new \Exception('Obat dengan ID ' . $obatId . ' tidak ditemukan.');
                }
    
                if ($obat->stok < $jumlah) {
                    throw new \Exception('Stok tidak cukup untuk obat "' . $obat->nama_obat . '".');
                }
    
                // Kurangi stok obat
                $obat->decrement('stok', $jumlah);
    
                // Simpan data ke tabel rawat_jalan_obat
                RawatJalanObat::create([
                    'rawat_jalan_diagnosa_id' => $rawatJalanDiagnosa->id,
                    'obat_id' => $obatId,
                    'jumlah' => $jumlah,
                ]);
            }
    
            DB::commit();
    
            return response()->json([
                'status' => 'success',
    'message' => 'Data berhasil diperbarui dan stok obat diperbaharui.',
    'redirect' => route('rawatJalan.index') // Tambahkan URL redirect
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
    
            // Log error untuk debugging
            \Log::error('Error saat mengupdate data rawat jalan: ' . $e->getMessage());
    
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
