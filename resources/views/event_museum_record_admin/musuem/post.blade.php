@extends('pradmin.dashboard')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h1>Upload musuem record</h1>
    </div>
    <div class="card-body">

      <form action="{{route('musuem.store')}}" method="POST" enctype="multipart/form-data">
     @csrf
     
  <div class="form-outline mb-4">
    <div class="row">
      <div class="col-md-9">
        <label class="form-label" for="recordName" >Title</label>
        <input type="text" name="recordName" class="form-control" />
      </div>
      <div class="col-md-3">
        <label class="form-label" for="recordimage">Cover Image</label>
        <input type="file" name="recordimage"class="form-control-file" />
      </div>
    </div>
  
  </div>


  <!-- Message input -->
  <div class="form-outline mb-4"> 
     <label class="form-label" for="description">Description</label>
    <textarea id="mytextarea" class="form-control" name="description"  rows="4"></textarea>

  </div>

  <!-- Submit button -->
  <div class="row">
    <div class="form-group">
       <button type="submit" class="btn-lg btn-primary  float-right "> Post </button>
    </div>
  </div>
</form>
    </div>
  </div>

</div>

@endsection