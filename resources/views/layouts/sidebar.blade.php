
@include('common.icons')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-expand sidebar-dark-primary "
    style="
display: inline-block;
	vertical-align: top;
	height: 100%;
    padding:1%;
	overflow: auto;
    position:fixed;

">


    <!-- Sidebar -->
    <div class="sidebar sidebar-collapse ">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">


                </li>

                <div style="text-align: center;color:azure; font-family: Times New Roman, Times, serif;">
                    <hr>
                    @include('common.doviz_kur')
                    <hr>
                </div>

                <li class="nav-item">
                    <a href="/" class="nav-link ">
                        <i class="fa-solid fa-users"></i>
                        <p>


                            Müşteri İşlemleri

                        </p>

                    </a>

                </li>
                <li class="nav-item">
                    <a href="/siparis_sorgu/index" class="nav-link ">
                        {{icon_select('shopping')}}
                        <p>


                            Sipariş Sorgulama

                        </p>

                    </a>

                </li>
                @php
                
                @endphp
                @if (Auth::user()->id == 1)
                    <li class="nav-item">
                        <a href="/users" class="nav-link">
                            <i class="fa-solid fa-user"></i>
                            <p>
                                Kullanıcı İşlemleri

                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/tahsilatlar" class="nav-link">
                        <i class="fa-solid fa-book"></i>
                        <p>
                            Alacak Defteri

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kasadefteri" class="nav-link">
                        <i class="fa-solid fa-cash-register"></i>
                        <p>

                            Kasa Defteri

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/task" class="nav-link">
                        <i class="fa-solid fa-book-open"></i>

                        Notlarım

                        </p>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
