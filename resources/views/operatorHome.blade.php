@extends('operatorApp')
@section('title', 'Dashboard')
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
      {{-- <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav> --}}
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('assets/admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Pasien <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$bookings_count}}</h2>
            <h6 class="card-text">Data Per {{date('d-M-y')}}</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('assets/admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Jumlah Dokter<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$doctors_count}}</h2>
            <h6 class="card-text">PAS</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('assets/admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Pelayanan Favorit <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{max($data)}}</h2>
            <h6 class="card-text">Increased by 5%</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">    
          <div class="card-body">
            <div class="row">
                <div class="col">
                <h6 class="m-0 font-weight-bold text-primary card-title">Data Booking Hari ini ({{count($bookings)}})</h6>
                </div>
                {{-- <div class="col text-right">
                    <a href="{{route('booking.create')}}" class="btn btn-primary btn-sm">Create Booking</a>
                </div> --}}
                </div>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Nama</th>
                  <th> No HP</th>
                  <th> Pelayanan </th>
                  <th> Doctor </th>
                  <th> Jam </th>
                  <th> Tanggal </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($bookings as $item)   
                <tr>
                  <td> {{$no++}} </td>
                  <td> {{$item->nama}} </td>
                  <td> {{$item->nohp}}</td>
                  <td> {{$item->service->pelayanan}}</td>
                  <td> {{$item->doctor->name}}</td>
                  <td> {{$item->jam}}</td>
                  <td>{{date('d-M-y', strtotime($item->tanggal))}}</td>
                  <td> @if($item->status == "pending")
                    <?php
                      $date_now = date("Y-m-d");
                      $tgl_exp = $item->tanggal;
                      $date_now_plus = date("Y-m-d", strtotime('+1 days', strtotime($tgl_exp)));

                      ?>
                      @if($date_now >= $date_now_plus)
                      <span class="badge badge-gradient-danger">Expired
                        @else 
                        <span class="badge badge-gradient-info">           
                        {{$item->status}}
                      </span>

                        @endif
                    
                  @elseif($item->status == "success")
                  <span class="badge badge-warning">
                    {{$item->status}}
                    </span>
                    @else
                    <span class="badge badge-danger">
                      {{$item->status}}
                      </span>
                      @endif
                  </td>
                  <td>
                    @if($item->status == "pending" || $item->status == "success" )
                      <?php
                      $date_now = date("Y-m-d");
                      $tgl_exp = $item->tanggal;
                      $date_now_plus = date("Y-m-d", strtotime('+1 days', strtotime($tgl_exp)));

                      ?>
                      @if($date_now >= $date_now_plus)
                      <a href="{{ route('showOpr', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-bullseye"></i> Show</a> 

                        @elseif($item->status == "pending") 
                        <a href="{{ route('bookingOprEdit', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-pencil-box-outline"></i> Edit</a> 
                        @else
                        <a href="{{ route('showOpr', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-bullseye"></i> Show</a> 
                        @endif  
                        @endif
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    

    {{-- <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Updates</h4>
            <div class="d-flex">
              <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                <span>jack Menqu</span>
              </div>
              <div class="d-flex align-items-center text-muted font-weight-light">
                <i class="mdi mdi-clock icon-sm mr-2"></i>
                <span>October 3rd, 2018</span>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6 pr-1">
                <img src="{{asset('assets/admin/assets/images/dashboard/img_1.jpg')}}" class="mb-2 mw-100 w-100 rounded" alt="image">
                <img src="{{asset('assets/admin/assets/images/dashboard/img_4.jpg')}}" class="mw-100 w-100 rounded" alt="image">
              </div>
              <div class="col-6 pl-1">
                <img src="{{asset('assets/admin/assets/images/dashboard/img_2.jpg')}}" class="mb-2 mw-100 w-100 rounded" alt="image">
                <img src="{{asset('assets/admin/assets/images/dashboard/img_3.jpg')}}" class="mw-100 w-100 rounded" alt="image">
              </div>
            </div>
            <div class="d-flex mt-5 align-items-top">
              <img src="{{asset('assets/admin/assets/images/faces/face3.jpg')}}" class="img-sm rounded-circle mr-3" alt="image">
              <div class="mb-0 flex-grow">
                <h5 class="mr-2 mb-2">School Website - Authentication Module.</h5>
                <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable content of a page.</p>
              </div>
              <div class="ml-auto">
                <i class="mdi mdi-heart-outline text-muted"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    {{-- <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Project Status</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Due Date </th>
                    <th> Progress </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> 1 </td>
                    <td> Herman Beck </td>
                    <td> May 15, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 2 </td>
                    <td> Messsy Adam </td>
                    <td> Jul 01, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 3 </td>
                    <td> John Richards </td>
                    <td> Apr 12, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 4 </td>
                    <td> Peter Meggik </td>
                    <td> May 15, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 5 </td>
                    <td> Edward </td>
                    <td> May 03, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 5 </td>
                    <td> Ronald </td>
                    <td> Jun 05, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-white">Todo</h4>
            <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
              <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
            </div>
            <div class="list-wrapper">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Call John </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Create invoice </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Print Statements </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
@endsection
@section('script')
<script>
  $(document).ready(function() {
  $('#example').DataTable();
  } );
</script> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection
