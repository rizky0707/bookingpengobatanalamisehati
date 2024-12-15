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
     * Tampilkan daftar obat.
     */
    public function index()
    {
        $obat = Obat::all();
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.obat.index', compact('obat', 'bookings_countApp', 'pembayarans_countApp'));
    }

    /**
     * Tampilkan formulir untuk menambahkan obat baru.
     */
    public function create()
    {
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.obat.create', compact('bookings_countApp', 'pembayarans_countApp'));
    }

    /**
     * Simpan data obat baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail obat.
     */
    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.show', compact('obat'));
    }

    /**
     * Tampilkan formulir untuk mengedit obat.
     */
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.obat.edit', compact('obat', 'bookings_countApp', 'pembayarans_countApp'));
    }

    /**
     * Perbarui data obat.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    /**
     * Hapus obat.
     */
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}
