
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

                {{-- <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
                </li> --}}
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    {{-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                    </a> --}}
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">

                                    <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                    </button>

                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </li>

             <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger rounded-pill navbar-badge ">{{$messages->count()}}</span>
                </a>
                    

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end " style="width: 20rem;">
                @if($messages->count()>0)
                    @foreach ($messages as $message)
                <a href="{{action('MessageController@show', $message->id)}}" class="dropdown-item">
                    <div class="media">
                        
                        <div class="media-body">
                            <h3 class="dropdown-item-title fw-bold">
                                {{$message->senderName}}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm mt-1">{{$message->message}}.</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>  {{$message->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </a>

            <div class="dropdown-divider"></div>
                    @endforeach
            <a href="{{action('MessageController@index')}}" class="dropdown-item dropdown-footer">See All Messages</a>
                @else
                <div class="text-center m-3 p-3">
                     <h4>No New Message!</h4>
                </div>
                @endif
        </div>
          
    </li> 



    
             <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                        <i class="far fa-bell mr-1"></i>
                        <span class="badge badge-warning rounded-pill navbar-badge ">{{$notifications->count()}}</span>
                    </a>
                    

            <div class="dropdown-menu  dropdown-menu-lg dropdown-menu-end " style="width: 20rem;">
                @if($notifications->count()>0)
                    @foreach ($notifications as $notification)
                <a href="{{action('NotificationController@show', $notification->id)}}" class="dropdown-item">
                    <div class="media">
                        
                        <div class="media-body">
                            <h3 class="dropdown-item-title fw-bold">
                                {{-- {{$notification->senderName}} --}}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm mt-1">{{$notification->data['title']}} Post Created.</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>  {{$notification->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </a>

            <div class="dropdown-divider"></div>
                    @endforeach
            <a href="{{action('NotificationController@index')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
          
           @else
           <div class="text-center m-3 p-3">
               <h4>No New Notification</h4>
           </div>
            @endif
        </div>
          
    </li> 

    {{-- <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
             <i class="far fa-bell mr-1"></i>
            <span class="badge badge-warning rounded-pill navbar-badge">{{$notifications->count()}}</span>
        </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end " style="width: 20rem;">
                @if(auth()->user())
                     @forelse($notifications as $notification)
                            <div class="alert alert-success" role="alert">
                                 {{ $notification->data['title'] }}
                                <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                    Mark as read
                                </a>
                            </div>

                            @if($loop->last)
                                <a href="#" id="mark-all">
                                    Mark all as read
                                </a>
                            @endif
                        @empty
                            There are no new notifications
                        @endforelse
                   
            <a href="{{action('NotificationController@index')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
           @endif
        </div>
          
    </li>  --}}


    {{-- <li class="nav-item dropdown ">
        <a class="nav-link  dropdown-toggle" data-bs-toggle="dropdown" href="#">
            <i class="far fa-bell mr-1"></i>
            <span class="badge badge-warning rounded-pill navbar-badge">{{$notifications->count()}}</span>
        </a>



        <div class="dropdown-menu dropdown-menu-lg-end" style="width: 17rem;">

            <span class="dropdown-header">{{$notifications->count()}} Notifications</span>
            <div class="dropdown-divider"></div>
            @forelse ($notifications as $notification)
                <div class="alert alert-success" role="alert">
                    <a href="{{action('NotificationController@show', $notification->id)}}" class="dropdown-item mark-as-read" data-id="{{$notification->id}}">
                         <i class="fas fa-envelope mr-2"></i> {{$notification->data['title']}}
                         <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                    </a>
                </div>
                @if($loop->last)
                    <a href="#" id="mark-all">
                        Mark all as read
                    </a>
                @endif
            @empty
              There is no new Notifications  
            @endforelse


            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>

            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>

            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>

            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>

        </div>
    </li> --}}



    <li class="nav-item dropdown no-arrow">
                    
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline fw-bold medium">{{Auth::user()->username}}</span>
            @if (Auth::user()->userType==='member')
                 <img   width="30px" height="30px" class="img-profile rounded-circle" src="/storage/images/{{Auth::user()->member->profileImg}}">
            @else
                 <img   width="30px" height="30px" class="img-profile rounded-circle" src="/storage/images/{{Auth::user()->admin->profileImg}}">
            @endif
        </a>
                   
        <!-- Dropdown - User Information -->
                   
        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
           @if (Auth::user()->userType==='member')
            <a class="dropdown-item" href="{{route('editMember',['id'=>Auth::user()->member_id])}}">
            @else
            <a class="dropdown-item" href="{{route('editAdmin',['id'=>Auth::user()->admin_id])}}">
           @endif
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            

                       
            <div class="dropdown-divider"></div>

                        
            <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </li>


</ul>
</nav>

