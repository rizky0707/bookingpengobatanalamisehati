<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawatJalan;
use App\Models\Booking;
use App\Models\KomfirmasiPembayaran;
use App\Models\Obat;
use Carbon\Carbon;
use Auth;


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
        $bookings_rawat_jalan = Booking::where('status', 'success')->whereDate('tanggal', Carbon::today())->get();
        $rawatJalans = RawatJalan::latest()->whereDate('created_at', Carbon::today())->get();

        // $sekarang = NOW();
        // dd($sekarang);
    // Pengecekan jika anamnesa sudah selesai
    foreach ($rawatJalans as $rawatJalan) {
        // If 'cek_anamnesa' exists, mark it as completed
        $rawatJalan->anamnesa_completed_at = !is_null($rawatJalan->cek_anamnesa) ? Carbon::now() : null;
    }

        return view('admin.rawat_jalan.index', compact('rawatJalans', 'bookings_countApp', 'pembayarans_countApp', 'bookings_rawat_jalan'));

    }

    

    public function kurangiStok(Request $request)
{
    $obatIds = $request->input('obat_ids');
    $jumlahs = $request->input('jumlahs');

    foreach ($obatIds as $index => $obatId) {
        $obat = Obat::find($obatId);
        $obat->stok -= $jumlahs[$index]; // Kurangi stok
        $obat->save();
    }

    return response()->json(['status' => 'success']);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
        
        // Jika Anda ingin mengambil hanya satu booking id pertama

        // / Mengambil ID booking yang statusnya 'success' dan tanggalnya hari ini
    $bookings = Booking::where('status', 'success')
                        ->whereDate('tanggal', Carbon::today())
                        ->get();

    // Mengambil ID booking dan user_id untuk setiap booking
    $booking_details = $bookings->map(function ($booking) {
        return [
            'booking_id' => $booking->id,
            'user_id' => $booking->user_id  // Asumsi bahwa relasi user_id ada di model Booking
        ];
    });

    // dd($booking_details);

        return view('admin.rawat_jalan.create', compact('bookings_countApp', 'pembayarans_countApp', 'booking_details'));
    }

    public function createDiagnosa()
    {
        $obatDiagnosa = Obat::latest()->get();
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
        
        // Jika Anda ingin mengambil hanya satu booking id pertama

        // / Mengambil ID booking yang statusnya 'success' dan tanggalnya hari ini
    $bookings = Booking::where('status', 'success')
                        ->whereDate('tanggal', Carbon::today())
                        ->get();

    // Mengambil ID booking dan user_id untuk setiap booking
    $booking_details = $bookings->map(function ($booking) {
        return [
            'booking_id' => $booking->id,
            'user_id' => $booking->user_id  // Asumsi bahwa relasi user_id ada di model Booking
        ];
    });

    // dd($booking_details);

        return view('admin.rawat_jalan.createDiagnosa', compact('bookings_countApp', 'pembayarans_countApp', 'booking_details', 'obatDiagnosa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    {

        // dd($request);
        $this->validate($request, [
            'tensi' => 'required|min:1',
            'gula_darah' => 'required|min:1',
            'asam_urat' => 'required|min:1',
            'kolesterol' => 'required|min:1',
            'booking_id' => 'required|exists:bookings,id', // Ensure booking_id exists in bookings table
            'cek_anamnesa' => 'required', // Ensure booking_id exists in bookings table

        ]);

        RawatJalan::create($request->all());
        return redirect()->route('rawatJalan.index')->with('success', 'Data Berhasil Di Tambahkan');
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
        //
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
        //
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
