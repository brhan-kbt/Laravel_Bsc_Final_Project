@extends('EducationAdmin.dashboard')
@section('content')

<main class="container">
   <div class="row">
      <div class="card shadow">
         <div class="card-header">
            <div class="row">
                <h4 class="card-title">Upload Education Materials!</h4>
            </div>
         </div>
         <div class="card-body">
          <form action="{{route('educ_material.store')}}" method="POST" enctype="multipart/form-data">
           @csrf
               <div class="row">
                  <div class="form-group">
                     <label class="form-label" for="title" >Title</label>
                     <input type="text" name="title"  class="form-control" />
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label" for="Author" >Author</label>
                        <input type="text" name="Author" class="form-control" />
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label" for="type" >Type</label>
                        <select class="form-select" name="type" aria-label="Default select example">
                              <option selected></option>
                              <option value="Book">Book</option>
                              <option value="Article">Article</option>
                            </select>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label" for="publishDate" >publish Date</label>
                        <input type="date" name="publishDate"  class="form-control" />
                     </div>
                  </div>
               </div>
  
               <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="form-label" for="cover_image" >Cover Image</label>
                           <input type="file" name="cover_image" class="form-control-file" />
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                              <label class="form-label" for="filename" >File</label>
                              <input type="file" name="filename" class="form-control-file" />
                        </div>                        
                     </div>
               </div>

               <div class="row">
                  <div class="form-group mb-4">
                     <label class="form-label" for="description" >Description</label>
                     <textarea id="mytextarea" name="description" class="form-control"  ></textarea>
                  </div>                    
               </div> 
          
                <div class="form-group">
                   <input type="submit" value="Upload" class="btn-lg btn-primary float-right">
                </div>
                          
              </form>
         </div>
      </div>
   </div>
</main>


@endsection