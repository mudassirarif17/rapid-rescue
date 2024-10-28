@extends('admin.nav_side')
@section('admin')

      <div class="container-fluid">
        <h1 class="text-center display-4 mb-5">Add a Ambulance</h1>
        <form action="/upload_ambulance" method="POST" >
          @csrf
          <div class="my-2">
            <input required type="text" name="vehiclenum" placeholder="Vehicle Number" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
          </div>
          <div class="mb-4">
            <label  for="exampleInputPassword1" class="form-label px-1">Ambulance Type</label><br>
            <label  for="" class="mx-3">Basic</label><input required value="Basic" type="radio" name="type">

            <label  for="" class="mx-3" >Advance</label><input required value="Advance" type="radio" name="type">
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Ambulance Capacity</label>
            <input required type="number" name="capacity" placeholder="Ambulance Capacity" class="form-control" id="exampleInputPassword1">
          </div>
          <button class="btn btn-primary w-100  fs-4 mb-4 rounded-2">Add Ambulance</>
          
        </form>
      </div>

      @endsection
      
    </div>
  </div>
  <script src="./admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./admin/assets/js/sidebarmenu.js"></script>
  <script src="./admin/assets/js/app.min.js"></script>
  <script src="./admin/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="./admin/assets/js/dashboard.js"></script>
</body>

</html>