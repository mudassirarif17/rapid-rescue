@extends('driver.nav-side')
@section('driver')
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
                <th>Condition</th>
                <th>Action</th>
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
                <td>{{$a->condition}}</td>
                <td>
                    @if($drivers->isAvailable == "0")
                        <a href="{{url('/accept_app_dri', $a->id)}}" class="btn btn-primary">Accept</a>
                    @else
                        <button disabled class="btn btn-info">Already Picked An Appointment</button>


               
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection