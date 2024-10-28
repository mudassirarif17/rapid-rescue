@extends('admin.nav_side')
@section('admin')

<h1 class="text-center mb-4">All Ambulance</h1>

<div class="my-3">
  <input id="inp" class="form-control" type="text" placeholder="Search Here">
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped mb-3">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Ambulance Number</th>
                <th scope="col">Capacity</th>
                <th scope="col">Level</th>
                <th scope="col">Reserved</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($amb as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->ambulance_num}}</td>
                <td>{{$a->ambulance_capacity}}</td>
                <td>{{$a->e_level}}</td>
                <td>{{$a->isReserved == 0 ? "Not reserved" : "Reserved"}}</td>
                <td>
                    <a class="btn btn-primary btn-sm mx-1" href="{{url('/edit_ambulance', $a->id)}}">Edit</a>
                    <a class="btn btn-primary btn-sm mx-1" href="#">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

   




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