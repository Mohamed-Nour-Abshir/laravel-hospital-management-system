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
       
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                    <button type="button" class="close" data-bs-dismiss="alert">X</button>
                </div>
            @endif

            <h1 class="p-3 m-3 bg-primary fs-1">Add Doctors</h1>
            <form action="{{url('/add_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-controll text-dark rounded" placeholder="Doctor Name">
                </div>
                <div class="form-group">

                    <input type="text" name="phone" class="form-controll text-dark rounded" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <select name="specialist" id="" class="form-controll text-dark rounded">
                        <option value="eye">Eye</option>
                        <option value="heart">Heart</option>
                        <option value="nose">Nose</option>
                        <option value="stomatch">Stomatch</option>
                    </select>
                </div>
                <div class="form-group">

                    <input type="text" name="room" class="form-controll text-dark rounded" placeholder="Room Number">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-controll rounded">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg form-controll">Submit</button>
                </div>
            </form>
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
  