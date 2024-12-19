<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;
use App\Models\Doctor;
use App\Models\CategoryService;
use App\Models\Booking;
use App\Models\KomfirmasiPembayaran;
use App\Models\Service;
use DB;
use Carbon\Carbon;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifs = Tarif::all();
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
        return view('admin.tarif.index', compact('tarifs', 'bookings_countApp', 'pembayarans_countApp'));

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

        return view('admin.tarif.create', compact('bookings_countApp', 'pembayarans_countApp'));
    }

    // public function GetSubCatAgainstMainCatEdit($id){
    //     echo json_encode(DB::table('services')->where('id_category', $id)->get());
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required|min:2',
            // 'id_doctor' => 'required',
            // 'id_category' => 'required',
            // 'id_service' => 'required',
        ]);
        Tarif::create($request->all());
        return redirect()->route('tarif.index')->with('success', 'Data Berhasil Di Tambahkan');
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
        $edit = Tarif::findorfail($id);
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
        return view('admin.tarif.edit', compact('edit', 'bookings_countApp', 'pembayarans_countApp'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarif $tarif)
    {
        $tarif->update($request->all());
        return redirect()->route('tarif.index')->with('success', 'Data Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarif = Tarif::findorfail($id);
        $tarif->delete();
        return redirect()->route('tarif.index')->with('success', 'Data Berhasil Di Delete');

    }
}
