@extends('pradmin.dashboard')
@section('content')
<main class="contaier">
    <!-- Main content -->
 <div class="container">
    <section class="content ">
      <div class="row">
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header bg-primary">
              <h3 class="card-title ">Create church profile</h3>
            </div>

            <form action="{{route('church_profile.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label" for="churchName" >Church Name:</label>
                    <input type="text" name="churchName" class="form-control" />
                </div>

               <div class="form-group">
                    <label class="form-label" for="address" >Address:</label>
                    <input type="text" name="address" class="form-control" />
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="form-label" for="email" >Email:</label>
                    <input type="email" name="email" class="form-control" />
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group mb-4">
                    <label class="form-label" for="phone" >Phone:</label>
                    <input type="text" name="phone" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="form-group">
                    <label class="form-label" for="description" >Description:</label>
                    <textarea  name="description" class="form-control" > </textarea>
              </div>

              <div class="form-group">
                    <label class="form-label" for="phone" >Image:</label>
                   <input type="file" name="photo" class="form-control-file" />
              </div>

              <div class="form-group">
                 <input type="submit" value="Create" class="btn btn-success float-right">
              </div>
           
            </div>
          </form>
        </div>
      </div>
       <div class="col-sm-4">
          <div class="text-danger">Note:</div>
        </div>
    </div>
  </section>
 </div>
    <!-- /.content -->
</main>
 @endsection