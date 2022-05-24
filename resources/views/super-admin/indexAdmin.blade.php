@extends('super-admin.dashboard')
@section('content')
<main class="container">
<div class="card">
  <div class="card-header">
   <div class="row">
        <div class="col-md-6">
             <p>Total Members: {{$mgrs->count()}} </p>
        </div>
        <div class="col-md-6">
            <a href="{{action('AdminController@create')}}" class="btn btn-success float-right">Add Manager</a>
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
        @foreach ($mgrs as $mgr)
          
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

</main>
@endsection
