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
                        <h4>Promise Report</h4>
                        <h5>Total Promised: {{$promises->sum('promisedAmount')}}</h5>
                        <h5>Total Paid: {{$promises->sum('paidAmount')}}</h5>
                        <h5>Total Left:  {{$promises->sum('promisedAmount') - $promises->sum('paidAmount')}}</h5>

                    </div>
                    <div class="card-body">
                             <div class="row">
 <table class="table table-striped table-hover table-responsive" id="myTable">
    <thead>
       <tr>
        <th>No. #</th>
        <th scope="col">Member Name</th>
        <th scope="col">Promised Amount</th>
        <th scope="col">Paid Amount</th>
        <th scope="col">Balance</th>
        <th scope="col">Promised Date</th>
        <th scope="col">Reason</th>
        {{-- <th scope="col">Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($promises as $promise)
        <tr>
            <td>{{$loop->iteration}}</td>
        <td>{{$promise->memberName}}</td>
        <td>{{$promise->promisedAmount}}</td>
        <td>{{$promise->paidAmount}}</td>
        <td>{{$promise->balance}}</td>
        <td>{{$promise->promisedDate}}</td>
        <td>{{$promise->reason}}</td>
        {{-- <td>
            <div class="d-flex">
                <a href="{{action('PromiseController@edit', ['promise'=>$promise->id])}}" title="edit" class="fa fa-edit text-success"></a>
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