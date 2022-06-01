@extends('layouts.app')
 @section('content')

  <main>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item  active">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <rect width="100%" height="100%" fill="" /></svg>
            <img src="{{asset('images/9.jpg')}}" alt="">

          <div class="container">
            <div class="carousel-caption">
              <h1 style=" margin:60px;  font-weight:900; color: rgb(20, 255, 7); align-text:center;" >እንኳን በደህና መጡ::</h1>
              <p style="color: floralwhite; font-weight:900;">And out of them shall proceed thanksgiving and the voice of them that make merry: and I will multiply them, and they shall not be few; I will also glorify them, and they shall not be small.
                <span style="color: rgb(20, 255, 7); font-style:italic; font-weight:900" id="sloganspan">~Jeremiah 30:19~</span></p>
              <div class="d-flex">
              {{-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> --}}
              <p><a  href="/register" class="btn btn-primary btn-lg">Register</a></p>
              <p><a href="{{action('UserAccountController@login')}}"  class="btn btn-primary btn-lg pr-6">Login</a></p>
            </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <rect width="100%" height="100%" fill="" /></svg>
             <img src="{{asset('images/5.jpg')}}" alt="">

          <div class="container">
            <div class="carousel-caption">
              <h1 style="margin:60px;  font-weight:900; color: rgb(20, 255, 7); align-text:center;"  >እንኳን በደህና መጡ::</h1>
              <p style="color: floralwhite; font-weight:900;">
                  A false balance is abomination to the LORD: but a just weight is his delight. The integrity of the upright shall guide them: but the perverseness of transgressors shall destroy them.
                    <span style="color: rgb(20, 255, 7); font-style:italic; font-weight:900" id="sloganspan">~Proverbs 11:1-3~</span></p>
              <div class="d-flex">
              {{-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> --}}
              <p><a  href="/register" class="btn btn-primary btn-lg">Register</a></p>
              <p><a href="{{action('UserAccountController@login')}}"  class="btn btn-primary btn-lg pr-6">Login</a></p>
            </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <rect width="100%" height="100%" fill="" /></svg>
             <img src="{{asset('images/6.jpg')}}" alt="">

       <div class="container">
            <div class="carousel-caption">
              <h1 style=" margin:60px;  font-weight:900; color: rgb(20, 255, 7); align-text:center;"  >እንኳን በደህና መጡ::</h1>
              <p style="color: floralwhite; font-weight:900;">
                  Have not I commanded thee? Be strong and of a good courage; be not afraid, neither be thou dismayed: for the LORD thy God is with thee whithersoever thou goest.

                  <span style="color: rgb(20, 255, 7); font-style:italic; font-weight:900" >~Joshua 1:9~</span></p>
              <div class="d-flex">
              {{-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> --}}
              <p><a  href="/register" class="btn btn-primary btn-lg">Register</a></p>
              <p><a href="{{action('UserAccountController@login')}}"  class="btn btn-primary btn-lg pr-6">Login</a></p>
            </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row" style="margin: -30px 0; background-color:#000000; color:floralwhite">
        <div class="col-lg-4  p-5 p-5">
          <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{asset('images/1.jpg')}}"
            aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <title>Mission</title> 

          <h2 style="color: rgb(20, 255, 7); font-weight:900; margin-top:5px;">Mission</h2>
          <p style="font-weight: bold">The Orthodox mission is to establish the Kingdom of God on earth bearing in mind that the whole of humanity should be united in the building up of the Kingdom of God. The faithful are both communally and individually a part of the mission to grow the One, Holy, Catholic, and Apostolic Church.</p>
          {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
        </div><!-- /.col-lg-4  p-5 -->
        <div class="col-lg-4  p-5">
          <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{asset('images/2.jpg')}}"
            aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <title>Placeholder</title>

          <h2 style="color: rgb(20, 255, 7); font-weight:900; margin-top:5px;">Vision</h2>
          <p style="font-weight: bold">As an Orthodox Christian community of believers, our vision is to experience a foretaste of God's Kingdom in this world and eternal life in His Kingdom to come.</p>
          {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
        </div><!-- /.col-lg-4  p-5 -->
        <div class="col-lg-4  p-5">
          <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{asset('images/3.jpg')}}"
            aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <title>Placeholder</title>

          <h2 style="color: rgb(20, 255, 7); font-weight:900; margin-top:5px;">Values</h2>
          <p style="font-weight: bold">
              The One, Holy, Catholic and Apostolic Church of Jesus Christ
              Witness. Proclaiming Christ in words and actions.
              Synergy. Doing the will and the work of God as 
              individuals and working together as 
              the Body of Christ.
          </p>
          {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
        </div><!-- /.col-lg-4  p-5 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
      <div class="container">
      <div class="row featurette" style="background-color: #e0e0e0; font-family:'Poppins', sans serif;padding: 20px;" >
        <div class="col-md-7" style="">
          <h4 class="featurette-heading" style="color: rgb(0, 0, 0);">Pope Shenouda III Of Alexandria <span class="text-muted"></span>
          </h4>
          <p class="lead">A Church without Youth is a Church without a future. Moreover, Youth without a Church is Youth without a future. </p>
        </div>
        <div class="col-md-5">
          <img style="height: 400px; border-radius:50%;" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
            height="500" src="{{asset('images/popeSh.jpg')}}" aria-label="Placeholder: 500x500"
            preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <title>Placeholder</title>

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette"  style="background-color: #e0e0e0; font-family:'Poppins', sans serif;padding: 20px;">
        <div class="col-md-7  order-md-2" >
          <h2 class="featurette-heading" style="margin: 5px; color: rgb(0, 0, 0); ">Pope Shenouda III Of Alexandria <span class="text-muted"></span></h2>
          <p class="lead" >But, did the Divinity [of Christ] suffer? [ ... ] 
               The holy fathers explained this point through the aforementioned clear
               example of the red-hot iron, it is the analogy equated for the Divine Nature
               which became united with the human nature. They explained that when the
               blacksmith strikes the red-hot iron, the hammer is actually striking 
               both the iron and the fire united with it. The iron alone bends (suffers) 
               whilst the fire is untouched though it bends with the iron. </p>
        </div>
        <div class="col-md-5 order-md-1">
          <img style="height: 500px; border-radius:50%;" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
            height="500" src="{{asset('images/popeSh.jpg')}}" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: 500x500"
            preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <title>Placeholder</title>

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette"  style="background-color: #e0e0e0; font-family:'Poppins', sans serif;padding: 20px;">
        <div class="col-md-7">
          <h2 class="featurette-heading">Pope Shenouda III Of Alexandria</h2>
          <p class="lead">As temples of the Holy Spirit. we should have communion with the Holy Spirit. 
            The work of any believer is not only the work of a 
            human individual, but is actually the work of the Holy Spirit.</p>
        </div>
        <div class="col-md-5">
          <img   style="height: 500px; border-radius:50%;" src="{{asset('images/popeSh.jpg')}}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
            height="500" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: 500x500"
            preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <title>Placeholder</title>
        </div>
      </div>
      </div>
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


  </main>


     
 @endsection