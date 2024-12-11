<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Booking;
use App\Models\KomfirmasiPembayaran;
use Carbon\Carbon;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::latest()->get();
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
        // $obats = Obat::all();
    foreach ($obats as $obat) {
        $obat->expired_in_1_month = Carbon::parse($obat->expired)->diffInDays(Carbon::now()) <= 30;
    }
    
        return view('admin.obat.index', compact('obats', 'bookings_countApp', 'pembayarans_countApp'));
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
        return view('admin.obat.create', compact('bookings_countApp', 'pembayarans_countApp'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_obat' => 'required|unique:obats|min:2',
            'jumlah' => 'required|numeric',
            'expired' => 'required|date',
        ]);
        Obat::create($request->all());
        return redirect()->route('obat.index')->with('success', 'Data Berhasil Di Tambahkan');

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
        $edit = Obat::findorfail($id);
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.obat.edit', compact('edit', 'pembayarans_countApp', 'bookings_countApp'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $obat->update($request->all());
        return redirect()->route('obat.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::findorfail($id);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Data Berhasil Di Delete');
    }
}
