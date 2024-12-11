<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\CategoryService;
use App\Models\Service;
use DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_service = CategoryService::all();
        return view('admin.doctor.create', compact('category_service'));
    }

    public function GetSubCatAgainstMainCatEdit($id){
        echo json_encode(DB::table('services')->where('id_category', $id)->get());
    }

    // public function findProductName(Request $request){

		
	//     //if our chosen id and products table prod_cat_id col match the get first 100 data 

    //     //$request->id here is the id of our chosen option id
    //     $data=Service::select('pelayanan','id')->where('id_category',$request->id)->get();
    //     return response()->json($data);//then sent this data to ajax success
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
    public function store(Request $request, Doctor $doctor)
    {
        $this->validate($request, [
            'name' => 'required|unique:doctors|min:2',
            'id_category' => 'required',
            'id_service' => 'required',
            'jam' => 'required',
            'jam_akhir' => 'required',
            'nohp' => 'required|min:11',
        ]);
        Doctor::create($request->all());
        return redirect()->route('doctor.index')->with('success', 'Data Berhasil Di Tambahkan');
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
        $edit = Doctor::findorfail($id);
        $category_service = CategoryService::all();
        $service = Service::all();
        return view('admin.doctor.edit', compact('edit', 'category_service', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        return redirect()->route('doctor.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findorfail($id);
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success', 'Data Berhasil Di Delete');
    }
}
