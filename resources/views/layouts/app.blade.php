

@include('layouts.header')
    @auth

    @include('layouts.navbar')
        @include('layouts.sidebar')
        <div class="content-wrapper" style="padding: 3%">
            @yield('content')
        
        </div>
       
        @include('layouts.footer')
        

    @endauth
    @guest
        @include('auth.login')
       
    @endguest

    @include('layouts.footer')



   
