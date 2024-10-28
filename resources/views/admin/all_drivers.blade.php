@extends('admin.nav_side')
@section('admin')

<h1 class="text-center mb-4">All Drivers</h1>

<div class="my-3">
  <input id="inp" class="form-control" type="text" placeholder="Search Here">
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped mb-3">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($driver as $d)
            @if($d->usertype == 1)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->phone}}</td>
                <td>{{$d->address}}</td>
                <td><img src="{{url('./driverimage' , $d->image)}}" alt="" style="max-width: 100px;"></td>
                <td class="">
                    <a class="btn btn-primary" href="{{url('/edit_driver', $d->id)}}">Edit</a>
                    <a onclick="return confirm('Are You Sure ?')" class="btn btn-primary mx-1" href="{{url('/delete_driver', $d->id)}}">Delete</a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

    {{ $driver->links() }}




@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#inp').on("keyup" , function(){
      var inp = $('#inp').val().toUpperCase();
      $('table tbody tr').filter(function(){
        $(this).toggle($(this).text().toUpperCase().indexOf(inp) > -1)
      })
    })
  })
</script>