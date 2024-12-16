<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\CategoryService;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Tarif;
use App\Models\User;
use App\Models\KomfirmasiPembayaran;
use App\Models\RawatJalanDiagnosa;
use App\Models\RawatJalan;
use Auth;
use DB;
use Carbon\Carbon;


class BookingController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $bookings = Booking::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $bookings = Booking::latest()->get();
        }
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.booking.index', compact('bookings', 'bookings_countApp', 'pembayarans_countApp')); 
    }




    // Menyediakan data jadwal selama 1 bulan ke depan
    public function getBookingSchedule()
    {
        $today = Carbon::today();
        $oneMonthLater = Carbon::today()->addMonth();

        // Ambil semua booking yang ada dalam rentang waktu 1 bulan ke depan
        $bookings = Booking::whereBetween('tanggal', [$today, $oneMonthLater])
                           ->get();

        // Format data menjadi array untuk jadwal yang tersedia
        $schedule = [];
        for ($date = $today; $date <= $oneMonthLater; $date->addDay()) {
            $isFullyBooked = $this->isDateFullyBooked($date);
            $schedule[] = [
                'date' => $date->toDateString(),
                'status' => $isFullyBooked ? 'Penuh' : 'Tersedia',
                'available_times' => $this->getAvailableTimes($date)
            ];
        }

        return response()->json($schedule);
    }

    // Mengecek apakah tanggal sudah penuh (hanya 1 booking per hari)
    private function isDateFullyBooked($date)
    {
        return Booking::where('tanggal', $date->toDateString())->count() >= 10;
    }

    // Mendapatkan jam yang tersedia pada tanggal tertentu
private function getAvailableTimes($date)
{
    // Ambil semua jam yang sudah dibooking pada tanggal tersebut
    $bookedTimes = Booking::where('tanggal', $date->toDateString())
                          ->pluck('jam') // Ambil semua jam yang sudah dibooking
                          ->toArray();

    // Definisikan jam operasional (09:00 - 21:00)
    $availableTimes = [];
    $startTime = Carbon::createFromFormat('H:i', '09:00');
    $endTime = Carbon::createFromFormat('H:i', '21:00');

    for ($time = $startTime; $time < $endTime; $time->addHour()) {
        $formattedTime = $time->format('H:i');
        
        // Lewati waktu istirahat: 12:00-13:00 dan 18:00-19:00
        if (
            ($formattedTime >= '12:00' && $formattedTime < '13:00') ||
            ($formattedTime >= '18:00' && $formattedTime < '19:00')
        ) {
            continue;
        }

        // Jika jam tersebut belum dibooking
        if (!in_array($formattedTime, $bookedTimes)) {
            $availableTimes[] = $formattedTime;
        }
    }

    return $availableTimes;
}



    public function print_booking()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $bookings = Booking::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $bookings = Booking::latest()->get();
        }

        return view('admin.laporan.bookings.print', compact('bookings', 'start_date', 'end_date'));

    }

    public function laporan_booking()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $bookings = Booking::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $bookings = Booking::latest()->get();
        }
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.laporan.bookings.index', compact('bookings', 'bookings_countApp', 'pembayarans_countApp'));

    }

    
     /**
     * Show the form for index a new landing.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLanding()
    {
        // $service = Service::latest()->get();
        return view('landing.homeLanding');
    }

    public function bookingOpr()
    {
        $bookings = Booking::latest()->get();
        return view('operator.booking.bookingOpr', compact('bookings'));
    }

    public function bookingLanding()
    {
        // $category_service = CategoryService::latest()->get();
        $tarif = Tarif::latest()->get();
        $service = Service::latest()->get();
        $user = User::latest()->get();
        return view('landing.bookingLanding', compact('service', 'user', 'tarif'));
    }

    public function bookingDefault()
    {
        $category_service = CategoryService::latest()->get();
        $service = Service::latest()->get();
        return view('landing.bookingDefault', compact('category_service', 'service'));
    }

    public function userLanding()
    {
        $booking = Booking::latest()->where('user_id', \Auth::user()->id)->get();
        $welcomeUser = User::where('id', \Auth::user()->id)->get();

        return view('landing.historyBooking', compact('booking', 'welcomeUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::latest()->get();
        $user = User::latest()->get();
        return view('admin.booking.create', compact('service', 'user'));
    }

    // public function GetService($id){
    //     echo json_encode(DB::table('services')->where('id_category', $id)->get());
    // }

    // public function GetDoctor($id){
    //     echo json_encode(DB::table('doctors')->where('id_service', $id)->get());
    // }

    // public function GetTarif($id){
    //     echo json_encode(DB::table('tarifs')->where('id', $id)->get());
    // }

    // public function findPrice(Request $request){
	
        // 	//it will get price if its id match with product id
        // 	$p=Product::select('price')->where('id',$request->id)->first();
            
        // 	return response()->json($p);
        // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBookingLanding(Request $request)
    {

        // dd($request);
        
        $this->validate($request, [
            'nama' => 'required|min:2',
            'nohp' => 'required|min:11',
            'jam' => 'required',
            // 'id_category' => 'required',
            'pelayanan' => 'required',
            // 'id_doctor' => 'required',
            // 'id_tarif' => 'required',
            'tanggal' => 'required|date',
            'alamat' => 'required|min:2',
            'keluhan' => 'required|min:2',
        ]);

        // Get the number of bookings for the selected date
    $existingBookings = Booking::where('tanggal', $request->tanggal)->count();

    // Check if the number of bookings exceeds 4
    if ($existingBookings >= 10) {
        return redirect()->back()->with('error', 'Sorry, there are already 10 bookings for this date. Please choose another date.');
    }

    // dd($request);

    // Clean the 'nominal' field (remove non-numeric characters)
    $nominalString = $request->nominal; // Example: "Rp. 40.000"
    $nominal = (int) preg_replace('/\D/', '', $nominalString); 
    

        $booking = new Booking;
        $booking->nama   = $request->nama;
        $booking->user_id   = Auth::id();
        $booking->nohp  = $request->nohp;
        $booking->jam = $request->jam;
        // $booking->id_category = $request->id_category;
        $booking->pelayanan = $request->pelayanan;
        // $booking->id_doctor = $request->id_doctor;
        $booking->nominal = $nominal;
        // $booking->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal);
        $booking->tanggal = $request->tanggal;
        $booking->alamat   = $request->alamat;
        $booking->keluhan   = $request->keluhan;

        // dd($booking);
        $booking->save();

         // Menyimpan data ke tabel rawat_jalan
    $rawatJalan = new RawatJalan;
    $rawatJalan->booking_id = $booking->id; // Relasi ke tabel booking
    $rawatJalan->user_id = $booking->user_id; // Relasi ke pengguna
    $rawatJalan->nama = $booking->nama;
    $rawatJalan->nohp = $booking->nohp;
    $rawatJalan->alamat = $booking->alamat;
    $rawatJalan->pelayanan = $booking->pelayanan;
    $rawatJalan->tanggal = $booking->tanggal;
    $rawatJalan->jam = $booking->jam;
    $rawatJalan->keluhan = $booking->keluhan;
    $rawatJalan->save();

    $rawatJalanDiagnosa = new RawatJalanDiagnosa;
    $rawatJalanDiagnosa->booking_id = $booking->id; // Relasi ke tabel booking
    $rawatJalanDiagnosa->user_id = $booking->user_id; // Relasi ke tabel booking
    $rawatJalanDiagnosa->save();

      
        return redirect()->route('showResult');

    }

    public function showResult()
    {
        $booking = Booking::latest()->limit(1)->where('user_id', \Auth::user()->id)->get();
        $settings = Setting::all();
        // dd($booking);
        return view('landing.showResult', compact('booking', 'settings'));
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
            'nama' => 'required|min:2',
            'nohp' => 'required|min:11',
            'jam' => 'required',
            'id_category' => 'required',
            'id_service' => 'required',
            'id_doctor' => 'required',
            'id_tarif' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required|min:2',
        ]);
        $booking = new Booking;
        $booking->nama   = $request->nama;
        $booking->user_id   = Auth::id();
        $booking->nohp  = $request->nohp;
        $booking->jam = $request->jam;
        $booking->id_category = $request->id_category;
        $booking->id_service = $request->id_service;
        $booking->id_doctor = $request->id_doctor;
        $booking->id_tarif = $request->id_tarif;
        // $booking->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal);
        $booking->tanggal = $request->tanggal;
        $booking->alamat   = $request->alamat;
        $booking->save();
        return redirect()->route('booking.index')->with('success', 'Data Berhasil Di Tambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_booking_admin = Booking::findorfail($id);
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.booking.show', compact('show_booking_admin', 'bookings_countApp', 'pembayarans_countApp'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBooking($id)
    {
        $show_booking = Booking::where('user_id', \Auth::user()->id)->findorfail($id);
        $welcomeUser = User::where('id', \Auth::user()->id)->get();

        return view('landing.showBooking', compact('show_booking', 'welcomeUser'));

    }

    public function showOpr($id)
    {
        $edit = Booking::findorfail($id);
        $category_service = CategoryService::latest()->get();
        $service = Service::latest()->get();
        $doctor = Doctor::latest()->get();
        $show_booking_operator = Booking::findorfail($id);
        return view('operator.booking.bookingOprShow', compact('show_booking_operator', 'category_service', 'service', 'doctor'));

    }

    public function showKomfirmasi()
    {
        $show_komfirmasi = Booking::latest()->limit(1)->where('user_id', \Auth::user()->id)->get();
        $welcomeUser = User::where('id', \Auth::user()->id)->get();
        $count_komfirmasi= Booking::latest()->limit(1)->where('user_id', \Auth::user()->id)->count();
        // dd($count_komfirmasi);
        return view('landing.antrian', compact('show_komfirmasi', 'welcomeUser', 'count_komfirmasi'));
    }

    public function editKomfirmasi($id)
    {
        $edit = Booking::findorfail($id);
        $category_service = CategoryService::all();
        $service = Service::latest()->get();
        $doctor = Doctor::latest()->get();
        $welcomeUser = User::where('id', \Auth::user()->id)->get();
        return view('landing.editKomfirmasi', compact('edit', 'doctor', 'category_service', 'service', 'welcomeUser'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Booking::findorfail($id);
        $bookings_countApp = Booking::where('status', 'pending')->whereDate('tanggal', Carbon::today())->count();
        $pembayarans_countApp = KomfirmasiPembayaran::where('status', 'checking')->count();

        return view('admin.booking.edit', compact('edit', 'bookings_countApp', 'pembayarans_countApp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editOpr($id)
    {
        $edit = Booking::findorfail($id);
        $category_service = CategoryService::all();
        $service = Service::latest()->get();
        $doctor = Doctor::latest()->get();
        return view('operator.booking.bookingOprEdit', compact('edit', 'doctor', 'category_service', 'service'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
         // Validasi input
    // $this->validate($request, [
    //     'nama' => 'required|min:2',
    //     'nohp' => 'required|min:11',
    //     'jam' => 'required',
    //     'pelayanan' => 'required',
    //     'tanggal' => 'required|date',
    //     'alamat' => 'required|min:2',
    //     'keluhan' => 'required|min:2',
    // ]);

    // Update data di tabel bookings
    $booking->update($request->all());

    // Update data di tabel rawat_jalan
    $rawatJalan = RawatJalan::where('booking_id', $booking->id)->first();
    

    if ($rawatJalan) {
        // Jika keluhan kosong, berikan nilai default
        // $keluhan = $request->keluhan ?: 'No complaints provided'; // Nilai default jika kosong

        // Perbarui data di rawat_jalan
        $rawatJalan->update([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'jam' => $request->jam,
            'pelayanan' => $request->pelayanan,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'status' => 'success', // Status berhasil diperbarui
        ]);
    }
    

    return redirect()->route('booking.index')->with('success', 'Data Berhasil Di Update');

    }

    public function updateOpr(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('bookingOpr')->with('success', 'Data Berhasil Di Update');
    }

    public function updateKomfirmasi(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('showKomfirmasi')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findorfail($id);
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Data Berhasil Di Delete');
    }
}
