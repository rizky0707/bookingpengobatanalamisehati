<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\KomfirmasiPembayaran;
use Carbon\Carbon;

class ManageUserController extends Controller
{
    //Call users Data
    public function index()
    {
        $users = User::whereNotIn('id', [1, 2, 3])->get();

        // dd($users);
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.user.index', compact('users', 'bookings_countApp', 'pembayarans_countApp'));
    }

    public function indexUser()
    {
        $indexUser = User::where('id', \Auth::user()->id)->get();
        $welcomeUser = User::where('id', \Auth::user()->id)->get();
        return view('landing.profile', compact('indexUser', 'welcomeUser'));
    }

    public function creteUser()
    {
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.user.create', compact('bookings_countApp', 'pembayarans_countApp'));
    }

    public function storeUser(Request $request)
    {

        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'is_admin' => 'required|in:1,2', // Validasi level
        ]);

         // Get the latest user to generate the next "no_rm"
    $user = User::latest()->first();
    $kodeRm = "ERM";

    if ($user == null) {
        // If no user exists, start the first record number
        $nomorUrut = 1;
    } else {
        // Generate the next record number based on the last user
        $nomorUrut = (int)substr($user->no_rm, 3, 6) + 1;
    }

    // Pad nomor urut to 6 digits
    $nomorUrut = str_pad($nomorUrut, 6, "0", STR_PAD_LEFT);

    // Generate the "no_rm"
    $noRm = $kodeRm . $nomorUrut;

        // Simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Enkripsi password
            'is_admin' => $request->is_admin,
            'no_rm' =>  $noRm,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('manageusers')->with('success', 'User berhasil dibuat!');

    }

    public function editUser($id)
{
    $user = User::findOrFail($id); // Cari user berdasarkan ID
    $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
    $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();
    return view('admin.user.edit', compact('user', 'bookings_countApp', 'pembayarans_countApp')); // Tampilkan form edit user
}


public function updateUser(Request $request, $id)
{
    // Validasi data input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id, // Email unik kecuali untuk pengguna ini
        'is_admin' => 'required', // Validasi level
        'is_active' => 'required|boolean', // Validasi status aktif/non-aktif
        'password' => 'nullable|string|min:6', // Password opsional tetapi harus minimal 6 karakter jika diisi
    ]);

    // Cari pengguna berdasarkan ID
    $user = User::findOrFail($id);
    // dd($request);

    // Siapkan data yang akan diperbarui
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'is_admin' => $request->is_admin,
        'is_active' => $request->is_active,
    ];

    // dd($data);

    // Perbarui password jika diisi
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password); // Enkripsi password baru
    }

    // dd($data);
    // Perbarui data pengguna
    $user->update($data);
    
    // Redirect dengan pesan sukses
    return redirect()->route('manageusers')->with('success', 'User berhasil diperbarui!');
}



    public function editProfile($id)
    {
        $user_edit = User::findorfail($id);
        $welcomeUser = User::where('id', \Auth::user()->id)->get();
        // dd($user_edit);
        return view('landing.editProfile', compact('user_edit', 'welcomeUser'));
    }

    public function updateProfile(Request $request, User $user)
    {
        // dd($request->all());
        
        $user->update($request->all());
        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }

   


}
