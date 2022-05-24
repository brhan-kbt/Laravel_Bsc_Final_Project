@extends('EducationAdmin.dashboard')
@section('content')

<div class="container">
<main class="container">
   <div class="row">
      <div class="card shadow">
         <div class="card-header">
            <div class="row">
                <h4 class="card-title">Edit Education Materials!</h4>
            </div>
         </div>
         <div class="card-body">
            <form action="{{route('educ_material.update',[$books->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
               <div class="row">
                  <div class="form-group">
                     <label class="form-label" for="title" >Title</label>
                     <input type="text" name="title" value="{{ $books->title}}" class="form-control" />
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label" for="Author" >Author</label>
                        <input type="text" name="Author" value="{{ $books->Author }}" class="form-control" />
                     </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="type" >Type</label>
                        <select class="form-select" name="type" aria-label="Default select example">
                              <option selected>{{$books->type}}</option>
                              @if ($books->type==='Book')
                                 <option value="Article">Article</option>
                               @else
                                 <option value="Book">Book</option>
                              @endif
                            </select>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label" for="publishDate" >publish Date</label>
                        <input type="date" name="publishDate" value="{{ $books->publishDate  }}" class="form-control" />
                     </div>
                  </div>
               </div>
  
               <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="form-label" for="cover_image" >Cover Image</label>
                           <input type="file" name="cover_image" value="{{ $books->cover_image  }}" class="form-control-file" />
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                              <label class="form-label" for="filename" >File</label>
                              <input type="file" name="filename" value="{{ $books->filename  }}" class="form-control-file" />
                        </div>                        
                     </div>
               </div>

               <div class="row">
                  <div class="form-group mb-4">
                     <label class="form-label" for="description" >Description</label>
                     <textarea id="mytextarea" name="description" class="form-control"  >{{ $books->description }}</textarea>
                  </div>                    
               </div> 
          
                <div class="form-group">
                   <input type="submit" value="Save Change" class="btn-lg btn-primary float-right">
                </div>
                          
              </form>
         </div>
      </div>
   </div>
</main>
</div>

{{-- <div class="container">
    <form action="{{route('educ_material.update',[$books->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
              <div class="card-body">
  
                <div class="form-group">
                    <label class="form-label" for="title" >Title</label>
                    <input type="text" name="title" value="{{ $books->title}}" class="form-control" />
                </div>
  
                 <div class="form-group">
                  <label class="form-label" for="Author" >Auther</label>
                  <input type="text" name="Auther" value="{{ $books->Author }}" class="form-control" />
                </div>
  
               <div class="form-group">
                  <label class="form-label" for="type" >Type</label>
                  <input type="text" name="type" value="{{ $books->type  }}" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="publishDate" >publish Date</label>
                     <input type="date" name="publishDate" value="{{ $books->publishDate  }}" class="form-control" />
                </div>
                  <div class="form-group mb-4">
                     <textarea id="mytextarea" name="description" class="form-control"  >{{ $books->description }}</textarea>
                </div>

                 <div class="form-group">
                    <label class="form-label" for="cover_image" >publish Date</label>
                     <input type="file" name="cover_image" value="{{ $books->cover_image  }}" class="form-control" />
                </div>

                 <div class="form-group">
                    <label class="form-label" for="filename" >publish Date</label>
                     <input type="file" name="filename" value="{{ $books->filename  }}" class="form-control" />
                </div>
  
                <div class="form-group">
                   <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            
               
              </div>
              </form>
</div> --}}
    
@endsection