@include('helper.functions')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <div class="container"style="padding: 1%">

        <ul class="navbar-nav">
            <li class="nav-item">
                <h6> {{showTodayName()}}&nbsp &nbsp&nbsp &nbspHoşgeldin, <strong>{{ Auth()->user()->name }}! </strong></h6>
            
            </li>
        
            
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="/logout" role="button"><i></i>Çıkış</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
