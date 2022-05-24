@extends('EducationAdmin.dashboard')
@section('content')
    {{-- <div class="container"> --}}
        
    <main class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <p>List of Education Materials</p>
                    </div>
                    <div class="col-md-6">
                        <a href="educ_material/create" class="btn btn-primary float-right mb-4">Upload</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <table  id="myTable" class="table table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>No#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Type</th>
                                <th>published date</th>
                                <th>description</th>
                                <th>Education Material</th>
                                <th colspan="2">action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->Author }}</td>
                                <td>{{ $book->type }}</td>
                                <td>{{ $book->publishDate }}</td>
                                <td> {{substr($book->description, 0, 100)}}...</td>
                                <td>  <img style="width:50px; height:40px;"src="/storage/educ_photo/{{$book->cover_image}}"> </td> 
                                <td >
                                    <a href="{{action('EducMaterialController@edit', ['educ_material'=>$book->id])}}" class=" text-success fa fa-edit ml-2" title="edit"></a>
                                    <a href=" {{ route('educ_material.destroy', $book->id) }}" class="text-danger fa fa-trash" title="delete"></a>
                                </td>
                             </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    {{-- <form action="" method="GET">
        <table id="myTable">
            @if (count($books)>0)
            <tr>
                <th>No#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Type</th>
                <th>published date</th>
                <th>description</th>
                <th>Education Material</th>
                <th colspan="2">action</th>
            </tr>
           
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->Author }}</td>
                <td>{{ $book->type }}</td>
                <td>{{ $book->publishDate }}</td>
                <td>{{ $book->description }}</td>
                 <td>  <img style="width:50px; height:40px;"src="/storage/educ_photo/{{$book->cover_image}}"> </td> 
                <td >
                    <a href="{{action('EducMaterialController@edit', ['educ_material'=>$book->id])}}" class=" text-success fa fa-edit ml-2" title="edit"></a>
                    <a href=" {{ route('educ_material.destroy', $book->id) }}" class="text-danger fa fa-trash" title="delete"></a>
                </td>
            </tr>
            @endforeach
            @else 
            <h1 style="margin: 20%; color:rgb(255, 0, 76)"> No books uploaded</h1>

            @endif
           
        </table>
    </form>
    </div> --}}
@endsection
@push('scripts')
    <script>
        $(document).ready( function () {
             $('#myTable1').DataTable();
        } );

    </script>
@endpush

