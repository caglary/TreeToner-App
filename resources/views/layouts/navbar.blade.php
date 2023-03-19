@include('helper.functions')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-sm navbar-light ">
    <div
        class="container"style="    
     display:block;
         border: 1px  #ddd;
         border-radius: 10px;
         padding: 1px;
         width: 550px;
      
    ">
        <div>
            <img src="/img/treetonerlogosmall.jpeg" style=" ;width: 100%; height: 50%;
    border-radius: 50px;
    ">
        </div>



    </div>
    <ul class="navbar-nav">

        <li class="nav-item" style="margin-left:15px;color:black">
            Hoşgeldin <strong>{{ auth()->user()->name }} </strong> ,
            {{ showTodayName() }}
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item" style="margin-left:5px">
            <a class="nav-link" href="/logout" role="button"><i></i>Çıkış</a>
        </li>
    </ul>
</nav>

<!-- /.navbar -->
