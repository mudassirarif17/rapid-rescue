@extends('admin.nav_side')
@section('admin')


       <div class="container-fluid w-75">
        <h1 class="text-center mt-3 mb-4">Add Driver</h1>
        <form action="/upload_driver" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <input required name="name" type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Name">
          </div>
          <div class="mb-3">
            <input required name="email" type="email" placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-4">
            <input required name="phone" placeholder="Phone" type="tel" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-4">
            <input required name="address" placeholder="Address" type="text" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Profile</label>
            <input required name="image" type="file" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary w-100  fs-4 mb-4 rounded-2">Add Driver</button>
          
        </form>
      </div> 

@endsection