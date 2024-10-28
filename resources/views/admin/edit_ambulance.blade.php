@extends('admin.nav_side')
@section('admin')


       <div class="container-fluid w-75">
        <h1 class="text-center display-5 mt-3 mb-4">Edit ambulance</h1>
        <form action="{{url('/update_ambulance' , $ambulance->id)}}" method="POST" >
          @csrf
          <div class="my-2">
            <input value="{{$ambulance->ambulance_num}}" type="text" name="vehiclenum" placeholder="Vehicle Number" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
          </div>
          <div class="mb-4">
    <label for="ambulanceType" class="form-label px-1">Ambulance Type</label><br>
    <label class="mx-3">
        <input type="radio" name="type" value="Basic" {{ $ambulance->e_level == 'Basic' ? 'checked' : '' }}>
        Basic
    </label>
    <label class="mx-3">
        <input type="radio" name="type" value="Advance" {{ $ambulance->e_level == 'Advance' ? 'checked' : '' }}>
        Advance
    </label>
</div>

          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Ambulance Capacity</label>
            <input value="{{$ambulance->ambulance_capacity}}" type="number" name="capacity" placeholder="Ambulance Capacity" class="form-control" id="exampleInputPassword1">
          </div>
          <button class="btn btn-primary w-100  fs-4 mb-4 rounded-2">Update Ambulance</>
          
        </form>
      </div> 

@endsection