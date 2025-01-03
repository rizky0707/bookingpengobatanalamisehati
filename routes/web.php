<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\KomfirmasiPembayaranController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RawatJalanController;
use App\Models\Booking;
use Illuminate\Http\Request; 
use Carbon\Carbon;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

// User booking 
Route::get('/', [BookingController::class, 'bookingLanding'])->name('bookingLanding');
Route::get('/history', [BookingController::class, 'userLanding'])->name('userLanding')->middleware('auth');
Route::post('/', [BookingController::class, 'storeBookingLanding'])->name('storeBookingLanding')->middleware('auth');
Route::get('/result', [BookingController::class, 'showResult'])->name('showResult')->middleware('auth');
Route::get('/showBooking/{id}', [BookingController::class, 'showBooking'])->name('showBooking')->middleware('auth');


// User dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// Admin dashboard
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// Operator 
Route::get('/operator/dashboard', [HomeController::class, 'operatorHome'])->name('operatorHome')->middleware('is_admin');
Route::get('operator/booking', [BookingController::class, 'bookingOpr'])->name('bookingOpr');
Route::get('operator/booking/edit/{id}', [BookingController::class, 'editOpr'])->name('bookingOprEdit');
Route::put('operator/booking/edit/{booking}', [BookingController::class, 'updateOpr'])->name('updateOpr');
Route::get('operator/booking/show/{id}', [BookingController::class, 'showOpr'])->name('showOpr');
Route::get('/komfirmasi', [BookingController::class, 'showKomfirmasi'])->name('showKomfirmasi');
Route::get('/editKomfirmasi/{id}', [BookingController::class, 'editKomfirmasi'])->name('editKomfirmasi');
Route::put('/editKomfirmasi/{booking}', [BookingController::class, 'updateKomfirmasi'])->name('updateKomfirmasi');


// admin manage users
Route::get('admin/users', [ManageUserController::class, 'index'])->name('manageusers')->middleware('is_admin');

Route::get('admin/users/{id}/edit', [ManageUserController::class, 'editUser'])->name('editUserAdmin')->middleware('is_admin');
Route::put('admin/users/{id}', [ManageUserController::class, 'updateUser'])->name('updateUser')->middleware('is_admin');

// admin rawat jalan
Route::get('admin/rawatJalan/{id}/editDiagnosa', [RawatJalanController::class, 'editDiagnosa'])->name('editDiagnosa')->middleware('is_admin');
Route::put('admin/rawatJalan/updateDiagnosa/{id}', [RawatJalanController::class, 'updateDiagnosa'])->name('updateDiagnosa')->middleware('is_admin');
Route::get('admin/rawatJalan/kartuRekamMedis', [RawatJalanController::class, 'indexKartuRekamMedis'])->name('indexKartuRekamMedis')->middleware('is_admin');

// Route admin-user
Route::get('admin/users/create', [ManageUserController::class, 'creteUser'])->name('creteUser')->middleware('is_admin');
Route::post('admin/users/create', [ManageUserController::class, 'storeUser'])->name('storeUser')->middleware('is_admin');

// Route User
Route::get('profile/edit/{id}', [ManageUserController::class, 'editProfile'])->name('editProfile')->middleware('auth');
Route::get('profile/', [ManageUserController::class, 'indexUser'])->name('indexUser')->middleware('auth');
Route::put('profile/update/{user}', [ManageUserController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');

// Admin Pelayanan
Route::resource('admin/service', ServiceController::class)->middleware('is_admin');

// Admin booking
Route::resource('admin/booking', BookingController::class)->middleware('is_admin');

// Admin Setting
Route::resource('admin/setting', SettingController::class)->middleware('is_admin');

// Admin biaya/tarif
Route::resource('admin/tarif', TarifController::class)->middleware('is_admin');

// Admin komfirmasi Pembayaran
Route::resource('admin/komfirmasiPembayaran', KomfirmasiPembayaranController::class)->middleware('is_admin');

// komfirmasi Pembayaran user
Route::get('createPembayaranUser', [KomfirmasiPembayaranController::class, 'createPembayaranUser'])->name('createPembayaranUser')->middleware('auth');
Route::post('storePembayaranUser', [KomfirmasiPembayaranController::class, 'storePembayaranUser'])->name('storePembayaranUser')->middleware('auth');
Route::get('showPembayaranUser/{id}', [KomfirmasiPembayaranController::class, 'showPembayaranUser'])->name('showPembayaranUser')->middleware('auth');
Route::get('/pembayaranHistory', [KomfirmasiPembayaranController::class, 'indexUserKomfir'])->name('indexUserKomfir')->middleware('auth');

// Admin obat
Route::resource('admin/obat', ObatController::class)->middleware('is_admin');

// admin rawat jalan
Route::resource('admin/rawatJalan', RawatJalanController::class)->middleware('is_admin');

// admin laporan (booking, biaya pendaftaran)
Route::get('print_booking', [BookingController::class, 'print_booking'])->name('print_booking')->middleware('is_admin');
Route::get('laporan_booking', [BookingController::class, 'laporan_booking'])->name('laporan_booking')->middleware('is_admin');

Route::get('print_biaya_pendaftaran', [KomfirmasiPembayaranController::class, 'print_biaya_pendaftaran'])->name('print_biaya_pendaftaran')->middleware('is_admin');
Route::get('laporan_biaya_pendaftaran', [KomfirmasiPembayaranController::class, 'laporan_biaya_pendaftaran'])->name('laporan_biaya_pendaftaran')->middleware('is_admin');

// Route Cek Booking Limit Per 1 hari
Route::get('/check-booking-limit', function (Request $request) {
    // Count the bookings for the selected date
    $bookingCount = Booking::where('tanggal', $request->tanggal)->count();

    if ($bookingCount >= 10) {
        return response()->json([
            'error' => true,
            'message' => 'Maaf, booking sudah Penuh, Pilih Tanggal Lain.' 
        ]);
    } else {
        return response()->json([
            'error' => false
        ]);
    }
});

Route::get('../admin/booking/{id}', [BookingController::class, 'showBookingDashboard'])->name('showBookingDashboard');


// Route Cek Booking Limit Per 1 hari

// In your routes/web.php or api.php (depending on whether it's an API route)
Route::get('/path-to-get-booking-count', function() {
    // Assume you have a Booking model that retrieves booking data
    $bookingsCount = \App\Models\Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
    
    // Return the count as JSON
    return response()->json(['bookings_countApp' => $bookingsCount]);
});

Route::get('/path-to-get-pembayaran-count', function() {
    // Assume you have a Booking model that retrieves booking data
    $pembayaransCount = \App\Models\KomfirmasiPembayaran::where('status', 'checking')->count();
    
    // Return the count as JSON
    return response()->json(['pembayarans_countApp' => $pembayaransCount]);
});

Route::get('/get-booking-schedule', [BookingController::class, 'getBookingSchedule']);

Route::get('/check-time-availability', [BookingController::class, 'checkTimeAvailability']);

Route::get('/get-booked-times', [BookingController::class, 'getBookedTimes']);

