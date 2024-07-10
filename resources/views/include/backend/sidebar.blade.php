<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-name flex-grow-1 text-center">
            <h5 class="mb-0">Inventory</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{ route('user.index') }}">
                    <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div class="menu-title">ACL</div>
                </a>
            </li>
            <li>
                <a href="{{ url('/') }}">
                    <div class="parent-icon"><i class="bi bi-house-fill"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-table"></i>
                    </div>
                    <div class="menu-title">Data Table</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('barang.index') }}">
                            <div class="parent-icon"><i class="bi bi-database-fill-gear"></i>
                            </div>
                            <div class="menu-title">Data Barang
                            </div>
                        </a>
                    </li>
                    <li>
                    <a href="{{route('masuk.index')}}">
                        <div class="parent-icon"><i class="bi bi-plus-circle"></i>
							</div>
							<div class="menu-title">Barang Masuk
						</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('keluar.index')}}">
                        <div class="parent-icon"><i class="bi bi-dash-circle"></i>
							</div>
							<div class="menu-title">Barang keluar
						</div>
                    </a>
                </li>
                    <li>
                        <a href="{{ route('history_barang.index') }}">
                            <div class="parent-icon"><i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div class="menu-title">History Barang
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <!--end navigation-->
    </div>
</aside>
