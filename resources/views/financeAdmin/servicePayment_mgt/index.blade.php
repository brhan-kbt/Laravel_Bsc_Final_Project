@extends('financeAdmin.dashboard')
@section('content')

    
<main class="container">
    <div class="card">
        <div class="row card-header">
            <div class="col-6">
                <p>Service Payment Dashboard</p>
            </div>
            <div class="col-6">
                <a href="{{action('ServicePaymentController@create')}}" class="btn btn-success float-right">Add Service Payment</a>
            </div>
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
                    <th class="col-1">Action</th>
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
                    <td>
                        <div class="d-flex">
                            <a href="{{action('ServicePaymentController@edit', ['servicePayment'=>$servicePayment->id])}}" title="Edit" class="fa fa-edit text-success"></a>
                        </div>
                        
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>



@endsection


      