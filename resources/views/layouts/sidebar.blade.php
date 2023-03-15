<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-expand sidebar-dark-primary " style="height: 100%;position:fixed;">


    <!-- Sidebar -->
    <div class="sidebar sidebar-collapse ">
        <!-- Sidebar user panel (optional) -->
        <div>
            <div><br>
                <img src="/img/treetonerlogosmall.jpeg" style=" ;width: 100%; height: 80%; ">
            </div>

        </div><br>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">


                </li>
                <div style="text-align: center;color:azure; font-family: Times New Roman, Times, serif;">
                    @include('common.doviz_kur')
                    <hr>
                </div>
               
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <p>

                           
                            Müşteri İşlemleri

                        </p>
                    </a>
                </li>
                @if (auth::user()->id == 1)
                    <li class="nav-item">
                        <a href="/users" class="nav-link">
                            {{-- <i class="nav-icon fas fa-th"></i> --}}
                            <p>
                                Kullanıcı İşlemleri

                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/tahsilatlar" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <p>
                            Alacak Defteri

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kasadefteri" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}

                        Kasa Defteri

                        </p>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
