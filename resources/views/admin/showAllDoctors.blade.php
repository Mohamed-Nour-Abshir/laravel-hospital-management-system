<!DOCTYPE html>
<html lang="en">
  @include('admin.css')
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
        <div class="container p-5 m-5 text-center">
            <table class="table table-stripped table-bordered mr-3">
                <tr>
                    <th>Doctor Name</th>
                    <th>Phone</th>
                    <th>Specialist</th>
                    <th>Room</th>
                    <th>image</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->specialist}}</td>
                    <td>{{$data->room}}</td>
                    <td><img width="300" height="100" src="Doctors/{{$data->image}}" alt=""></td>
                    <td><a href="{{url('/deleteDoctor',$data->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this Doctor?')">Delete</a></td>
                    <td><a href="{{url('/updateDoctor',$data->id)}}" class="btn btn-primary">Update</a></td>
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
  