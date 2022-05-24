<a href="#" class="brand-link text-decoration-none mb-2">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <div   class="brand-image img-circle elevation-3 text-center" style="opacity: .8">
                {{-- <img width="50px" height="50px" src="/storage/images/{{Auth::user()->admin->profileImg}}" class="img-circle elevation-2" > --}}
            </div>
            {{-- /storage/churchP_images/{{$post->photo}} --}}

        <span class="brand-text font-weight-light">Admin Dashboard!</span>
    </a>


    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="" class="img-circle elevation-2" >
            </div>

            <div class="info">
                <a href="#" class="d-block text-decoration-none fw-bold">User: {{Auth::user()->admin->adminName}}</a>
            </div>

        </div>
