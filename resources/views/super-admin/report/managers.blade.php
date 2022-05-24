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
               <div class="row">
 <table class="table  table-striped  table-hover table-responsive" id="myTable">
   <thead>
        <tr>
        <th class="col-1">No.#</th>
        <th class="col-4">Full Name</th>
        <th class="col-4">username</th>
        <th class="col-2">Role</th>
        <th class="col-1">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($managers as $mgr)
          
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$mgr->adminName}}</td>
        <td>{{$mgr->user->username}}</td>
        <td>{{$mgr->adminRole}}</td>
        <td>
            <div class="d-flex">
                <a href="{{action('AdminController@edit', ['managemgr'=>$mgr->id])}}" title="edit" class=""><i class="fas fa-edit mr-1"></i></a>
                <a href="#" class="" title="delete"><i class="fas fa-trash text-danger"></i></a>
            </div>
            
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

            </div>
            
        </div>
    </div>
</div>
@endsection