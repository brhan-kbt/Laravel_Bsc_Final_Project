@include('layouts.dashboard_header')

@include('layouts.dashboard_body')

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow:hidden">

   @include('layouts.userProfile')


    <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                    
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/educAdmin" class="nav-link">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

                              

                                <li class="nav-item">
                                    <a href="/educAdmin/educ_material" class="nav-link">
                                        <i class="nav-icon fas fa-book-open"></i>
                                        <p>
                                            Manage Educ_Material
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
                </nav>
                <!-- /.sidebar-menu -->
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