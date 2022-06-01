@extends('layouts.app')
@section('content')


<main class="container mt-5">
    <div class="card card-body">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-8">
                <img style="width:100%; height:500px"src="/storage/musuem_images/{{$post->recordimage}}" >
            </div>
            <div class="col-md-4">
                <h4>Title: <span>{{$post->recordName}}</span></h4>
                <h4 >Posted: <span><a href="#">{{$post->created_at->diffForHumans()}}</a></span></h4>
            </div>
        </div>

        <div class="row mb-3">
           <h1>{{$post->title}}</h1>
            <p class="m-1 ">{!!$post->description!!}</p> 
        </div>
        <hr>
    @endforeach
    </div>
</main>

{{-- 
<main class="container mt-5">
<div class="flex justify-center ">
<div class="w-8/12 bg-white p-6 rounded-lg">

@if(count($posts)>0)

<div class="card">
    
<ul class="list-group list-group-flush">
@foreach($posts as $post)
<div class="row mb-4">
    <div class="col-md-4">
        <img style="width:100%;"src="/storage/musuem_images/{{$post->recordimage}}" >
        
    </div>

    <div class="col-md-8">
        <h1>{{$post->recordName}}</h1>
        <p>{{$post->description}}</p> 
        
     <p style="float: inline-end;">
     </p>  
       

<p><a href="#" class="link-item " style="text-decoration: none;">Posted: {{$post->created_at->diffForHumans()}}</a></p>
    
    </div>
</div>
   <hr>

@endforeach
</ul>
</div>
@endif

</div>
</div>

</main> --}}
@endsection