@extends('pradmin.dashboard')
@section('content')
{{-- <div class="flex justify-center ">
<div class="w-8/12 bg-white p-6 rounded-lg"> --}}
<div class="container">
<a href="musuem/create" class="btn btn-primary mb-4">Create New Record</a>

@if(count($posts)>0)
<div class="card shadow">
    <div class="card-header">List of Posts Created!</div>
<ul class="list-group list-group-flush">
@foreach($posts as $post)
    <div class="row">
        <div class="col-12 m-2">
            <h1 class="h1 font-weight-bold">Title: {{$post->recordName}} </h1>
        </div>
        <div class="col-sm-6 m-1">
            <img style="width:100%; height:350px;"src="/storage/musuem_images/{{$post->recordimage}}" >
        </div>
        <div class="col-sm-4 m-3">
            <p> <span class="h6 font-weight-bold">Posted: </span> {{$post->created_at->diffForHumans()}}</a></p>
            <p class="h6 font-weight-bold">Actions:</p>
            <div class="m-1">
                <p class="ml-5">
                    <a href="{{route('editMuseumPost',['id'=>$post->id])}}" class="btn btn-outline-info">Edit </a> 
                </p>  
                {!!Form::open(['route' => ['musuem.destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-outline-danger ml-5'])}}
                {!!Form::close()!!} 
            </div>
        </div>
    </div>
    <div class="row m-3">
        <p class="float-left">Created by: <span class="text-decoration-underline font-weight-bold">{{$post->admin->adminName}}</span></p>
        <p class="text-justify">{!!$post->description!!}</p>    
    </div>
    <hr>
@endforeach

</ul>

</div>

@endif
@endsection







{{-- 


 <div class="row mb-4">
    <div class="col-sm-8">
        <img style="width:100%; height:300px;"src="/storage/musuem_images/{{$post->recordimage}}" >
    </div>
    <div class="col-sm-4">
    <p>
        <div style="display: flex; m-4">
            <p style="float: inline-end;">
                <a href="{{route('editMuseumPost',['id'=>$post->id])}}" class="btn btn-info">Update </a> 
            </p>  
            {!!Form::open(['route' => ['musuem.destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!} 
        </div>
    </p> 
   </div>
 </div>

 <div class="row">
    <p><a href="#" class="link-item " style="text-decoration: none;">Posted: {{$post->created_at->diffForHumans()}}</a></p>
    </div>
    <div class="col-md-8">
        <h1>{{$post->recordName}}</h1>
        <p>{{$post->description}}</p>    
    </div>
   </div>
</div>
<hr> --}}
{{-- 
@endforeach
</ul>
</div>
@endif

</div>
</div>
@endsection --}}