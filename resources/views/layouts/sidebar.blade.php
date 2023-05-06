<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    @if(Auth::user()->is_admin == 1)
                    <li>
                        <a href="{{url('/admin/daftar-kelas')}}" class="nav-link px-0 align-middle">Daftar Kelas </a>
                        <!-- <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{url('/admin/daftar-guru')}}" class="nav-link px-0 align-middle">Daftar Guru</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/daftar-murid')}}" class="nav-link px-0 align-middle ">Daftar Murid</a>
                    </li>
                    <!-- <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li> -->
                    @elseif(Auth::user()->is_teacher == 1)
                    <li>
                        <a href="{{url('/teacher/daftar-kelas')}}" class="nav-link px-0 align-middle ">Kelas</a>
                    </li>
                    <li>
                        <a href="{{url('/teacher/buat-laporan-harian')}}" class="nav-link px-0 align-middle ">Laporan Harian</a>
                    </li>
                    <li>
                        <a href="{{url('/teacher/buat-laporan-bulanan')}}" class="nav-link px-0 align-middle ">Laporan Bulanan</a>
                    </li>
                    @endif
                </ul>

            </div>
        </div>
        <div class="col py-3">
            @yield('contents')
        </div>
    </div>
</div>