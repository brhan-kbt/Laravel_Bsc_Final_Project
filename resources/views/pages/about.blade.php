@extends('layouts.app')
@section('content')

<main>
    <div class="container mt-5">
        <div class="card card-body">
        @foreach ($posts as $post )
            <div class="container">
                <div class="row">
                    <h2 class="m-1 mb-4 decoration-underline font-weight-bold">Church Profile and Description</h2>
                    <div class="col-sm-6">
                        <img class="col-12"style=" height:300px"src="/storage/churchP_images/{{$post->photo}}" >
                    </div>
                    <div class="col-sm-6">
                       <strong>Church Name: </strong> <h5>{{$post->churchName}}</h5>
                       <strong>Address:</strong><h5>{{$post->address}}</h5>
                       <strong>Email: </strong> <h5>{{$post->email}}</h5>
                       <strong>Phone Number:</strong><h5>{{$post->phone}}</h5>
                    </div>
                </div>
                <div class="row m-1">
                        <strong class="m-1">About the Church</strong>
                        <p>{!!$post->description!!}</p>
                </div>
                <div class="row m-1">
                     @if(!Auth::guest())
                        <div class="col-sm-9">
                            <p class="col-sm-6"><a href="church_profile/{{$post->id}}/edit" class="text-success font-weight-bold m-1 text-decoration-none">Click here</a> if you want to update</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
@endforeach
    </div>
</main>
@endsection