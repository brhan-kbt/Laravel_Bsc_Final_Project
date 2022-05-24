<main class="container">
    <form action="{{action('AdminController@update',$admin->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 card shadow">
                            <div class="row card-header"><h1>Update Profile</h1></div>
                            <div class="row">
                                <div class="p-3">
                                <label for="adminName" class="form-label">Full Name</label>
                                <input type="text" name="adminName" class="form-control @error('adminName') is-invalid @enderror" value="{{$admin->adminName}}"  autocomplete="adminName" autofocus  id="email" >
                                
                                @error('adminName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="p-3 m">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $admin->user->username }}"  autocomplete="username" autofocus  id="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 p-3">
                                    <div>
                                        <label for="profileImg" class="form-label">Image</label>
                                        <input type="file" name="profileImg" class="form-control-file @error('profileImg') is-invalid @enderror" value="{{ $admin->profileImg }}"  autocomplete="profileImg" autofocus id="profileImg">
                                    
                                        @error('profileImg')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="adminRole" class="form-label">Role</label>
                                        @if (Auth::user()->userType != 'super')
                                        <select class="form-select @error('adminRole') is-invalid @enderror" value="{{ $admin->adminRole }}" disabled autocomplete="adminRole" autofocus  name="adminRole" aria-label="Default select example">
                                            <option value="super">{{$admin->adminRole}}</option>
                                        </select> 
                                        @else                  
                                        <select class="form-select @error('adminRole') is-invalid @enderror" value="{{ $admin->adminRole }}" autocomplete="adminRole" autofocus  name="adminRole" aria-label="Default select example">
                                            <option value="super">Super Admin</option>
                                            <option value="educmgr">Education Manager</option>
                                            <option value="pradmin">PR Manager</option>
                                            <option value="financemgr">Finance Manager</option>
                                            <option value="membermgr">Member Manager</option>
                                        </select>
                                        @endif
                                    
                                        @error('adminRole')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn-lg btn-primary mb-3 float-right">Save Change</button>
                            </div>
                        </div>
                    </fieldset>
                        <div class="col-md-4">
                                <h2 class="fw-bold text-primary">Detail information!</h2>   
                                <div class="row">
                                    <img class="mb-3" width="50px" height="200px" src="/storage/images/{{$admin->profileImg}}" alt="">
                                    <h6 class="fw-bold">Full Name: <span class="text-primary"> {{$admin->adminName}}</span></h6>
                                    <h6 class="fw-bold">Username: <span class="text-primary"> {{$admin->user->username}}</span></h6>
                                    <h6 class="fw-bold">Role: <span class="text-primary"> {{$admin->adminRole}} <span class="text-danger">(You can't change the role unless you are super admin)</span></span></h6>
                                </div>                         
                        </div>
                    </div>
                </div>
            </div>


{{-- 
            <div class="row col-sm-7 ">
                <div class="mb-3">
                <label for="adminName" class="form-label">Full Name</label>
                <input type="text" name="adminName" class="form-control @error('adminName') is-invalid @enderror" value="{{$admin->adminName}}"  autocomplete="adminName" autofocus  id="email" >
                
                  @error('adminName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
            </div>
            <div class="row col-sm-7">
                <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $admin->user->username }}"  autocomplete="username" autofocus  id="username">

                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                <label for="profileImg" class="form-label">Image</label>
                <input type="file" name="profileImg" class="form-control @error('profileImg') is-invalid @enderror" value="{{ $admin->profileImg }}"  autocomplete="profileImg" autofocus id="profileImg">
            
                @error('profileImg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
            </div>
            </div>
            <div class="col-sm-2">
                <div class="mb-3">
                    <label for="adminRole" class="form-label">Role</label>
                    @if (Auth::user()->userType != 'super')
                    <select class="form-select @error('adminRole') is-invalid @enderror" value="{{ $admin->adminRole }}" disabled autocomplete="adminRole" autofocus  name="adminRole" aria-label="Default select example">
                        <option value="super">{{$admin->adminRole}}</option>
                    </select> 
                    @else                  
                    <select class="form-select @error('adminRole') is-invalid @enderror" value="{{ $admin->adminRole }}" autocomplete="adminRole" autofocus  name="adminRole" aria-label="Default select example">
                        <option value="super">Super Admin</option>
                        <option value="educmgr">Education Manager</option>
                        <option value="pradmin">PR Manager</option>
                        <option value="financemgr">Finance Manager</option>
                        <option value="membermgr">Member Manager</option>
                      
                    </select>
                    @endif

                  
                    @error('adminRole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="col-sm-7 btn btn-primary">Submit</button>
        </div> --}}

</form>
</main>