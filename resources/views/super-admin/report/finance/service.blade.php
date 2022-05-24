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
                        <h4>Offering Report</h4>
                        <h5>Total: {{$servicePayments->sum('amount')}}</h5>

                    </div>
                    <div class="card-body">
                                <table class="table table-responsive table-hover table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                        <th class="col-1">No.#</th>
                                        <th class="col-3">Member Name</th>
                                        <th class="col-2">Phone</th>
                                        <th class="col-2">Date</th>
                                        <th class="col-1">Amount</th>
                                        <th class="col-2">Reason</th>
                                        {{-- <th class="col-1">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($servicePayments as $servicePayment)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$servicePayment->memberName}}</td>
                                        <td>{{$servicePayment->phone}}</td>
                                        <td>{{$servicePayment->paidDate}}</td>
                                        <td>{{$servicePayment->amount}}</td>
                                        <td>{{$servicePayment->reason}}</td>
                                        {{-- <td>
                                            <div class="d-flex">
                                                <a href="{{action('ServicePaymentController@edit', ['servicePayment'=>$servicePayment->id])}}" title="Edit" class="fa fa-edit text-success"></a>
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
@endsection