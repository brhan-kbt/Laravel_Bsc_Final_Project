@extends('super-admin.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h4>Add Admin/ Managers</h3>
                </div>
                <div class="card-body">
                    <form action="{{action('AdminController@store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
     
                            <div class="row">
                                <div class="mb-3">
                                    <label for="adminName" class="form-label">Full Name</label>
                                    <input type="text" name="adminName" class="form-control @error('adminName') is-invalid @enderror" value="{{ old('adminName') }}"  autocomplete="adminName" autofocus  id="email" >

                                    @error('adminName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"  autocomplete="username" autofocus  id="username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                        <div class="row">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"  autocomplete="password" autofocus id="password">
                                
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
           
                           
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="profileImg" class="form-label">Image</label>
                                        <input type="file" name="profileImg" class="form-control-file @error('profileImg') is-invalid @enderror" value="{{ old('profileImg') }}"  autocomplete="profileImg" autofocus id="profileImg">
            
                                        @error('profileImg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="adminRole" class="form-label">Role</label>
                                        <select class="form-select @error('adminRole') is-invalid @enderror" value="{{ old('adminRole') }}"  autocomplete="adminRole" autofocus  name="adminRole" aria-label="Default select example">
                                            <option value="super">Super Admin</option>
                                            <option value="educmgr">Education Manager</option>
                                            <option value="pradmin">PR Manager</option>
                                            <option value="financemgr">Finance Manager</option>
                                            <option value="memberadmin">Member Manager</option>
                                        </select>
                                        @error('adminRole')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn-lg btn-primary float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection