<!DOCTYPE html>
<html lang="en">
  @include('admin.css')
  <style>
    table{
      width: 20px !important;
      margin-left: -200px;

    }
  </style>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      @include('admin.sidenavbar')
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">
        <div class="container m-5" >
            <table class="table table-stripped table-bordered ">
                <tr>
                    <th>Customer Name</th>
                    <th>Emial</th>
                    <th>Phone</th>
                    <th>Doctor Name</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Approved</th>
                    <th>Cancled</th>
                    <th>Send Mail</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->doctor}}</td>
                    <td>{{$data->message}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->status}}</td>
                    <td><a href="{{url('/approved',$data->id)}}" class="btn btn-success">Approved</a></td>
                    <td><a href="{{url('/Cancled',$data->id)}}" class="btn btn-danger">Cancled</a></td>
                    <td><a href="{{url('/SendMail',$data->id)}}" class="btn btn-primary">Send Mail</a></td>
                </tr>
                @endforeach
                
            </table>
        </div>
       
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.js')
  </body>
</html>
  