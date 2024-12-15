<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\CategoryService;
use App\Models\User;
use App\Models\KomfirmasiPembayaran;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $booking = Booking::whereDate('tanggal', Carbon::today())->where('user_id', \Auth::user()->id)->get();
        // $category_service = CategoryService::all();
        // $doctors_count = Doctor::all()->count();
        $bookings_count = Booking::where('status', 'success')->where('user_id', \Auth::user()->id)->count();
        $welcomeUser = User::where('id', \Auth::user()->id)->get();
        return view('landing.homeLanding', compact('booking', 'bookings_count', 'welcomeUser'));
    }

    // public function appAdmin()
    // {
    //     $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
    //     // dd($bookings_count);
    //     return view('layouts.app', compact('bookings_countApp'));

    // }

    

    public function adminHome()
    {
        $bookings = Booking::whereDate('tanggal', Carbon::today())->get();
        $bookings_count = Booking::where('status', 'success')->count();
        // Menghitung jumlah masing-masing pelayanan yang dipilih
    $pelayanan_count = Booking::latest()
    ->select('pelayanan', \DB::raw('count(*) as count'))
    ->groupBy('pelayanan')
    ->get();

        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

    // Menghitung total nominal pembayaran untuk booking yang berstatus 'success'
    $total_nominal = KomfirmasiPembayaran::join('bookings', 'komfirmasi_pembayarans.booking_id', '=', 'bookings.id')
        ->where('komfirmasi_pembayarans.status', 'success')  // Hanya yang statusnya success
        ->sum('bookings.nominal');  // Jumlahkan nilai nominal

        // dd($total_nominal);

        return view('adminHome', compact('bookings', 'bookings_count', 'bookings_countApp', 'pembayarans_countApp', 'pelayanan_count', 'total_nominal'));
    }

    
    public function operatorHome()
    {
        $bookings = Booking::whereDate('tanggal', Carbon::today())->get();
        $bookings_count = Booking::all()->count();
        $bookings_count_favorit_1 = Booking::all()->where('id_category', 1)->count();
        $bookings_count_favorit_2 = Booking::all()->where('id_category', 2)->count();
        $bookings_count_favorit_3 = Booking::all()->where('id_category', 3)->count();
        $data = compact('bookings_count_favorit_1', 'bookings_count_favorit_2', 'bookings_count_favorit_3');
        // max($data);
        // dd($data);
        $doctors_count = Doctor::all()->count();
        return view('operatorHome', compact('bookings', 'bookings_count', 'doctors_count', 'data'));
    }

    // public function doctorHome()
    // {
    //     $bookings = Booking::whereDate('tanggal', Carbon::today())->get();
    //     $bookings_count = Booking::all()->count();
    //     $bookings_count_favorit_1 = Booking::all()->where('id_category', 1)->count();
    //     $bookings_count_favorit_2 = Booking::all()->where('id_category', 2)->count();
    //     $bookings_count_favorit_3 = Booking::all()->where('id_category', 3)->count();
    //     $data = compact('bookings_count_favorit_1', 'bookings_count_favorit_2', 'bookings_count_favorit_3');
    //     // max($data);
    //     // dd($data);
    //     $doctors_count = Doctor::all()->count();
    //     return view('doctorHome', compact('bookings', 'bookings_count', 'doctors_count', 'data'));
    // }
}
