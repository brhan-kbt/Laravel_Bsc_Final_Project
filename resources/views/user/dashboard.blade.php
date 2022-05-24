@include('layouts.dashboard_header')
@include('layouts.dashboard_body')


<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow:hidden">

    <a href="#" class="brand-link text-decoration-none">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}

            <div  class="brand-image img-circle elevation-3" style="opacity: .8">
                <img src="" class="img-circle elevation-2" >
            </div>

        <span class="brand-text">Member Dashboard!</span>
    </a>


    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="" class="img-circle elevation-2" >
            </div>

            <div class="info">
                <a href="#" class="d-block text-decoration-none">User: {{Auth::user()->member->fullName}}</a>
            </div>

        </div>


  
                      <!-- Sidebar Menu -->
                <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{action('UserAccountController@user')}}" class="nav-link">
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
                                        Financial Issues
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{action('MemberController@donate')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Donate</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{action('MemberController@status')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Promise Status</p>
                                        </a>
                                    </li>
                                    
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-bible"></i>
                                    <p>
                                        Educational Material
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{action('EducMaterialController@displayBooks')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Books</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{action('EducMaterialController@displayArticles')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Articles</p>
                                        </a>
                                    </li>
                                    
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="{{action('MessageController@index')}}" class="nav-link">
                                        <i class="nav-icon fas fa-bell"></i>
                                        <p>
                                            Message
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('editMember',['id'=>Auth::user()->member_id])}}" class="nav-link">
                                        <i class="nav-icon fas fa-cog"></i>
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
        @include('layouts.messages')

    </div>

</div>

@include('layouts.dashboard_footer')