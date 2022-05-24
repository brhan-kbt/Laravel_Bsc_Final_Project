@include('layouts.dashboard_header')
@include('layouts.dashboard_body')

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow:hidden">

    @include('layouts.userProfile')


                <!-- Sidebar Menu -->
                <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{action('TitheController@home')}}" class="nav-link">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-money-bill-alt"></i>
                                    <p>
                                       Manage Finance
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{action('TitheController@index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tithe</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{action('OfferingController@index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Offering</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{action('PromiseController@index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Promise</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{action('ServicePaymentController@index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Service Payment</p>
                                        </a>
                                    </li>
                                    
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="{{action('MessageController@index')}}" class="nav-link">
                                        <i class="nav-icon fas fa-comments"></i>
                                        <p>
                                            Message
                                        </p>
                                    </a>
                                </li>

                                
                                 <li class="nav-item">
                                    <a href="{{route('editAdmin',['id'=>Auth::user()->admin_id])}}" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Update Profile
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-sign-out-alt"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                 </ul>
                </nav>
                <!-- /.sidebar-menu -->
        </div>
</aside>

<div class="content-wrapper">
    <div class="content-header">
      
    </div>



    <div class="content">
        
        @yield('content')
        @include('layouts.messages')

        {{-- <p>This is a Finance manager dashborad.</p> --}}

    </div>

</div>

@include('layouts.dashboard_footer')