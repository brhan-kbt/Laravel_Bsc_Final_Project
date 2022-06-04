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
                                    <a href="/pradmin" class="nav-link">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

                                

                                <li class="nav-item">
                                    <a href="/pradmin/musuem" class="nav-link">
                                        <i class="nav-icon fas fa-screwdriver"></i>
                                        <p>
                                            Manage Musuem Artifact
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/pradmin/posts" class="nav-link">
                                        <i class="nav-icon fas fa-info"></i>
                                        <p>
                                            Manage Events
                                        </p>
                                    </a>
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
                                    <a href="/pradmin/church_profile" class="nav-link">
                                        <i class="nav-icon fas fa-church"></i>
                                        <p>
                                            Church Profile
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
        </div>
</aside>

<div class="content-wrapper">
    <div class="content-header">
      
    </div>



    <div class="content">
        
        @yield('content')
    </div>

</div>
@include('layouts.dashboard_footer')