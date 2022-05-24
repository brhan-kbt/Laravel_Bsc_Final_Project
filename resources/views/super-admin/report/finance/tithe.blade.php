@extends('super-admin.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="form-group">
                    <label for="report">Select Report!</label>
                    <div name="report">
                        <a href="{{action('AdminController@memberReport')}}" class="btn text-decoration-none btn-primary ">Member Report</a>
                        <a href="{{action('AdminController@financeReport')}}" class="btn text-decoration-none btn-success">Financial Report</a>
                        <a href="{{action('AdminController@managersReport')}}" class="btn text-decoration-none btn-info">Managers Report</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <a href="{{action('AdminController@titheReport')}}" class="btn-sm text-decoration-none btn-primary">Tithe Report</a>
                    <a href="{{action('AdminController@promiseReport')}}" class="btn-sm text-decoration-none btn-success">Promise Report</a>
                    <a href="{{action('AdminController@offeringReport')}}" class="btn-sm text-decoration-none btn-info">Offering Report</a>
                    <a href="{{action('AdminController@serviceReport')}}" class="btn-sm text-decoration-none btn-danger">Service Payment Report</a>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4>Tithe Report</h4>
                        <h5>Total: {{$tithes->sum('amount')}}</h5>
                    </div>
                    <div class="card-body">
                                <div class="row card-body">
            <table class="table table-responsive table-striped table-hover" id="myTable">

                <thead>
                    <tr>
                    <th class="col-1">No. #</th>
                    <th class="col-4">Member Name</th>
                    <th class="col-2">Phone</th>
                    <th class="col-2">Date</th>
                    <th class="col-2">Amount</th>
                    {{-- <th class="col-2">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tithes as $tithe)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$tithe->memberName}}</td>
                    <td>{{$tithe->phone}}</td>
                    <td>{{$tithe->date}}</td>
                    <td>{{$tithe->amount}}</td>
                    {{-- <td>
                        <div class="d-flex">
                            <a href="{{action('TitheController@edit', ['tithe'=>$tithe->id])}}" title="Edit" class="fa fa-edit  text-success"></a>
           
                        </div>
                        
                    </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection