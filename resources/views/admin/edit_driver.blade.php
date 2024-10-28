@extends('admin.nav_side')
@section('admin')


       <div class="container-fluid w-75">
        <h1 class="text-center mt-3 mb-4">Edit Driver</h1>
        <form action="{{url('/update_driver', $drivers->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <input value={{$drivers->name}} name="name" type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Name">
          </div>
          <div class="mb-3">
            <input value={{$drivers->email}} name="email" type="email" placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-4">
            <input value={{$drivers->phone}} name="phone" placeholder="Phone" type="tel" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-4">
            <input value={{$drivers->address}} name="address" placeholder="Address" type="text" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Profile</label>
            <input name="image" type="file" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary w-100  fs-4 mb-4 rounded-2">Update ambulance</button>
          
        </form>
      </div> 

@endsection