@extends('pradmin.dashboard')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h1>Edit Posts</h1>
    </div>
    <div class="card-body">

      <form action="{{route('posts.update', $posts->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PUT')
     
  <div class="form-outline mb-4">
    <div class="row">
      <div class="col-md-9">
        <label class="form-label" for="title" >Title</label>
        <input type="text" name="title" value="{{$posts->title}}" class="form-control" />
      </div>
      <div class="col-md-3">
        <label class="form-label" for="post_image">Cover Image</label>
        <input type="file" name="post_image"class="form-control-file" />
      </div>
    </div>
  
  </div>


  <!-- Message input -->
  <div class="form-outline mb-4"> 
     <label class="form-label" for="description">Description</label>
    <textarea id="mytextarea" class="form-control" name="description"  rows="4">{{$posts->description}}</textarea>

  </div>

  <!-- Submit button -->
  <div class="row">
    <div class="form-group">
        <button type="submit" class="btn-lg btn-primary float-right"> Save Change </button>
    </div>
  </div>
</form>
    </div>
  </div>

</div>

@endsection