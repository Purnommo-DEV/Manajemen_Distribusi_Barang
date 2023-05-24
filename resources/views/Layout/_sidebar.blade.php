<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('Assets/logo/PT_SWS_V1.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold">PT. Sumber Wijaya Sakti</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            {{-- SUPERADMIN --}}
            {{-- @if (Auth::user()->relasi_role->role == 'superadmin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('superadmin.Dashboard*') ? 'active' : '' }} "
                        href="{{ route('superadmin.Dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-home {{ request()->routeIs('superadmin.Dashboard*') ? 'warna-white' : 'warna-black' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('superadmin.HalamanPengguna*') ? 'active' : '' }} "
                        href="{{ route('superadmin.HalamanPengguna') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-users {{ request()->routeIs('superadmin.HalamanPengguna*') ? 'warna-white' : 'warna-black' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Pengguna</span>
                    </a>
                </li> --}}


            {{-- ADMIN --}}
            @if (Auth::user()->relasi_role->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.Dashboard*') ? 'active' : '' }} "
                        href="{{ route('admin.Dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-home {{ request()->routeIs('admin.Dashboard*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.Produk*') ? 'active' : '' }} "
                        href="{{ route('admin.Produk') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                            <i
                                class="fas fa-boxes {{ request()->routeIs('admin.Produk*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.HalamanCustomer*') ? 'active' : '' }} "
                        href="{{ route('admin.HalamanCustomer') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                            <i
                                class="fas fa-store {{ request()->routeIs('admin.HalamanCustomer*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Customer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.HalamanPengguna*') ? 'active' : '' }} "
                        href="{{ route('admin.HalamanPengguna') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                            <i
                                class="fas fa-users {{ request()->routeIs('admin.HalamanPengguna*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.HalamanArea*') ? 'active' : '' }} "
                        href="{{ route('admin.HalamanArea') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                            <i
                                class="fas fa-map-marker {{ request()->routeIs('admin.HalamanArea*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Area</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.HalamanKendaraan*') ? 'active' : '' }} "
                        href="{{ route('admin.HalamanKendaraan') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                            <i
                                class="fas fa-truck-pickup {{ request()->routeIs('admin.HalamanKendaraan*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Kendaraan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#basicExamples"
                        class="nav-link
                    {{ request()->routeIs('admin.HalamanPerjalanan*') ? 'active' : '' }}
                    {{ request()->routeIs('admin.HalamanPenagihanHutang*') ? 'active' : '' }}"
                        aria-controls="basicExamples" role="button" aria-expanded="true">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-route
                                @if (request()->routeIs('admin.HalamanPerjalanan*')) {{ request()->routeIs('admin.HalamanPerjalanan*') ? 'warna-white' : 'warna-black' }}
                                @elseif(request()->routeIs('admin.HalamanPenagihanHutang*'))
                                    {{ request()->routeIs('admin.HalamanPenagihanHutang*') ? 'warna-white' : 'warna-black' }}
                                @else
                                    warna-black @endif
                                ">
                            </i>
                        </div>
                        <span class="nav-link-text ms-1">Perjalanan</span>
                    </a>
                    <div class="collapse" id="basicExamples">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item {{ request()->routeIs('admin.HalamanPerjalanan*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.HalamanPerjalanan') }}">Daftar Perjalanan
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse" id="basicExamples">
                        <ul class="nav ms-4 ps-3">
                            <li
                                class="nav-item {{ request()->routeIs('admin.HalamanPenagihanHutang*') ? 'active' : '' }}">
                                <a class="nav-link" href="#foundationExample">Daftar Hutang Customer
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.Laporan*') ? 'active' : '' }} "
                        href="{{ route('admin.Laporan') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-home {{ request()->routeIs('admin.Laporan*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li> --}}



                {{-- MARKETING --}}
                {{-- @elseif (Auth::user()->relasi_role->role == 'marketing')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('marketing.Dashboard*') ? 'active' : '' }} "
                        href="{{ route('marketing.Dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-home {{ request()->routeIs('marketing.Dashboard*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('marketing.Produk*') ? 'active' : '' }} "
                        href="{{ route('marketing.Produk') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                            <i
                                class="fas fa-boxes {{ request()->routeIs('marketing.Produk*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('marketing.HalamanDistributor*') ? 'active' : '' }} "
                        href="{{ route('marketing.HalamanDistributor') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                            <i
                                class="fas fa-building {{ request()->routeIs('marketing.HalamanDistributor*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Distributor</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('marketing.Pesanan*') ? 'active' : '' }} "
                        href="{{ route('marketing.Pesanan') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-list {{ request()->routeIs('marketing.Pesanan*') ? 'warna-white' : 'warna-black' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pesanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('marketing.Pengembalian*') ? 'active' : '' }} "
                        href="{{ route('marketing.Pengembalian') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-share {{ request()->routeIs('marketing.Pengembalian*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Pengembalian</span>
                    </a>
                </li> --}}


                {{-- PRODUKSI --}}
                {{-- @elseif (Auth::user()->relasi_role->role == 'produksi')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('produksi.Dashboard*') ? 'active' : '' }} "
                        href="{{ route('produksi.Dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-home {{ request()->routeIs('produksi.Dashboard*') ? 'warna-white' : 'warna-black' }}"></i>

                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('produksi.Produksi*') ? 'active' : '' }} "
                        href="{{ route('produksi.Produksi') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-boxes {{ request()->routeIs('produksi.Produk*') ? 'warna-white' : 'warna-black' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">Produksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('produksi.BarangKeluar*') ? 'active' : '' }} "
                        href="{{ route('produksi.BarangKeluar') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas fa-truck {{ request()->routeIs('produksi.BarangKeluar*') ? 'warna-white' : 'warna-black' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">Barang Keluar</span>
                    </a>
                </li> --}}
            @endif
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('Logout*') ? 'active' : '' }} " href="{{ route('Logout') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">

                        <i
                            class="fas fa-outdent {{ request()->routeIs('Logout*') ? 'warna-white' : 'warna-black' }}"></i>

                    </div>
                    <span class="nav-link-text ms-1">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
