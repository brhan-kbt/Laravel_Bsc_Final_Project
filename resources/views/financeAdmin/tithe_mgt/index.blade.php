@extends('financeAdmin.dashboard')
@section('content')

    
<main class="container">
    <div class="card">
        <div class=" row card-header">
            <div class="col-6">

            </div>
            <div class="col-6">
                    <a href="{{action('TitheController@create')}}" class="btn btn-success float-right">Add Tithe</a>
            </div>
        </div>
        <div class="row card-body">
            <table class="table table-responsive table-striped table-hover" id="myTable">

                <thead>
                    <tr>
                    <th class="col-1">No. #</th>
                    <th class="col-4">Member Name</th>
                    <th class="col-2">Phone</th>
                    <th class="col-2">Date</th>
                    <th class="col-2">Amount</th>
                    <th class="col-2">Action</th>
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
                    <td>
                        <div class="d-flex">
                            <a href="{{action('TitheController@edit', ['tithe'=>$tithe->id])}}" title="Edit" class="fa fa-edit  text-success"></a>
            {{--             
                        
                            {!!Form::open(['action'=>['TitheController@destroy', $tithe->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class'=>'btn btn-outline-danger'])}}
                            {!!Form::close()!!}  --}}


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


      