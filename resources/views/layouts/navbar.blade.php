<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <div class="container"style="padding: 1%">
      {{-- <a href="/" class="navbar-brand">
        <img src="/img/treetonerlogosmall.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a> --}}
      <!-- Left navbar links -->
      <ul class="navbar-nav" >
        <li class="nav-item" >
            <h6 >  &nbsp &nbsp&nbsp &nbspHoşgeldin, <strong>{{Auth()->user()->name}}!</strong></h6>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Müşteriler</a>
        </li>
        
        --}}
      </ul>
     
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link"   href="/logout" role="button"><i
              ></i>Çıkış</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->