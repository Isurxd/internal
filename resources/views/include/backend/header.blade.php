<header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4">
        <div class="btn-toggle">
            <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
        </div>
        <div class="card-body search-content">
            <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                <div class="notify-list">
                </div>
            </div>
        </div>


        <ul class="navbar-nav gap-1 nav-right-links align-items-center ms-auto">


            <li class="nav-item dropdown">
                <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <img src="" class="rounded-circle p-1 border" width="45" height="45" alt="">
                </a>
                <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                    <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                        <div class="text-center">
                            @if (Auth::check())
                                <h5 class="user-name mb-0 fw-bold">Hello, {{ Auth::user()->name }}</h5>
                            @endif
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i
                            class="material-icons-outlined">power_settings_new</i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

    </nav>
</header>
