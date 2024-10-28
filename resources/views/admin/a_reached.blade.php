@extends('admin.nav_side')
@section('admin')
<h1 class="text-center display-5">Reached Rides</h1>
<div class="container">
<div class="table-responsive">
    <table class="table table-bordered table-striped my-4">
        <thead>
            <tr>
                <th>Id</th>
                <th>Patient Name</th>
                <th>User Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Completed By</th>
                <th>Requested At</th>
                <th>Reached At</th>
                <th>Condition</th>
            </tr>
        </thead>
        <tbody>
            @foreach($app as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->p_name}}</td>
                <td>{{$a->email}}</td>
                <td>{{$a->phone}}</td>
                <td>{{$a->address}}</td>
                <td>{{$a->driver_name}}</td>
                <td>{{$a->created_at}}</td>
                <td>{{$a->updated_at}}</td>
                <td>{{$a->condition}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection
