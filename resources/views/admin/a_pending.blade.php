@extends('admin.nav_side')
@section('admin')
<h1 class="text-center display-5">REQUESTS IN PENDING</h1>
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
                <th>IsAccepted</th>
                <th>Requested At</th>
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
                <td>{{$a->isAccepted == "0" ? "Not Accepted" : "Accepted"}}</td>
                <td>{{$a->created_at}}</td>
                <td>{{$a->condition}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection
