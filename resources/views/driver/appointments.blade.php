@extends('driver.nav-side')
@section('driver')
<h1 class="text-center mb-3 display-5">All Appointments</h1>

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
                <th>Condtion</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($app as $a)
            @if($a->driver_id == Auth::User()->id)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->p_name}}</td>
                <td>{{$a->email}}</td>
                <td>{{$a->phone}}</td>
                <td>{{$a->address}}</td>
                <td>{{$a->isAccepted == "0" ? "Not Accepted" : "Accepted"}}</td>
                <td>{{$a->condition}}</td>
                <td>
                    @if($a->isReached == "0")
                        <a class="btn btn-primary" href="{{url('/reached_app_dri' , $a->id)}}">Reached</a>
                    @else
                        <button disabled class="btn btn-info">SuccessFully Reached</button>
                    @endif
                </td>
            </tr>
            @endif
            
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection