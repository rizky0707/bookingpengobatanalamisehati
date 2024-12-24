<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Models\KomfirmasiPembayaran;
use App\Models\Booking;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class KomfirmasiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
*
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komfirmasiPembayaran = KomfirmasiPembayaran::latest()->get();
        // Pastikan pengguna terautentikasi
        // $user = Auth::user();

        // Periksa apakah pengguna memiliki booking terakhir
        // $booking_id = optional($user->last_booking)->id ?? null;

        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
        return view('admin.komfirmasi_pembayaran.index', compact('komfirmasiPembayaran', 'bookings_countApp', 'pembayarans_countApp'));
    }

    public function indexUserKomfir()
    {
        // $komfirmasiPembayaran = KomfirmasiPembayaran::latest()->get();
        $komfirmasiPembayaran = KomfirmasiPembayaran::latest()->where('user_id', \Auth::user()->id)->get();
        $welcomeUser = User::where('id', \Auth::user()->id)->get();

        return view('landing.indexUserKomfir', compact('komfirmasiPembayaran', 'welcomeUser'));
    }


    public function print_biaya_pendaftaran()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $komfirmasiPembayaran = KomfirmasiPembayaran::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $komfirmasiPembayaran = KomfirmasiPembayaran::latest()->get();
        }

        return view('admin.laporan.biaya.print', compact('komfirmasiPembayaran', 'start_date', 'end_date'));

    }

    public function laporan_biaya_pendaftaran()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $komfirmasiPembayaran = KomfirmasiPembayaran::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $komfirmasiPembayaran = KomfirmasiPembayaran::latest()->get();
        }
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.laporan.biaya.index', compact('komfirmasiPembayaran', 'bookings_countApp', 'pembayarans_countApp'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPembayaranUser()
    {
        // Pastikan pengguna terautentikasi
        $user = Auth::user();

        // Periksa apakah pengguna memiliki booking terakhir
        $booking_id = optional($user->last_booking)->id ?? null;


        // Kirim nilai $booking_id ke view// Misalnya mengambil booking_id dari booking terakhir pengguna
        return view('landing.komfirmasi_bayar', compact('booking_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storePembayaranUser(Request $request)
{
    // Validate the incoming request
    $this->validate($request, [
        'nama_pengirim' => 'required|min:2',
        'nomor_rekening_pengirim' => 'required|min:3',
        'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate as an image
        'booking_id' => 'required|exists:bookings,id', // Ensure booking_id exists in bookings table
    ]);

    $booking_id = $request->input('booking_id');  // Retrieve booking_id from the request

    if (!$booking_id) {
        $booking_id = Auth::user()->last_booking->id;  // Assuming last_booking relation exists
    }

    if($request->file('bukti_pembayaran')) {
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('bukti_pembayaran')->getClientOriginalExtension();
        $img = $manager->read($request->file('bukti_pembayaran'));
        $img = $img->resize(396, 800);

        $img->toJpeg(80)->save(base_path('public/upload/bukti_pembayaran/'.$name_gen));
        $save_url = 'upload/bukti_pembayaran/'.$name_gen;
    

    // Create a new KomfirmasiPembayaran record
    
    KomfirmasiPembayaran::insert([
        'nama_pengirim' => $request->nama_pengirim,
        'nomor_rekening_pengirim' => $request->nomor_rekening_pengirim,
        'bukti_pembayaran' => $save_url,
        'user_id' => Auth::id(),
        'booking_id' => $booking_id, 
    ]);

    }
    return redirect()->route('showResult')->with('success', 'Data Berhasil Di Tambahkan');
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

    public function showPembayaranUser($id)
    {
        $show_pembayaran = KomfirmasiPembayaran::where('user_id', \Auth::user()->id)->findorfail($id);
        $welcomeUser = User::where('id', \Auth::user()->id)->get();

        return view('landing.showPembayaran', compact('show_pembayaran', 'welcomeUser'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
        $edit = KomfirmasiPembayaran::findorfail($id);
        return view('admin.komfirmasi_pembayaran.edit', compact('edit', 'bookings_countApp', 'pembayarans_countApp'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KomfirmasiPembayaran $komfirmasiPembayaran)
    {
        $komfirmasiPembayaran->update($request->all());
        return redirect()->route('komfirmasiPembayaran.index')->with('success', 'Data Berhasil Di Update');
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
