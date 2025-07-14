<header class="header" style="background-color: #343a40; color: white; padding: 15px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="لوگو" style="max-height: 50px;">
                    <div class="dropdown d-inline-block ms-3">
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            منوی اصلی
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('home') }}">صفحه اصلی</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile') }}">پروفایل</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">پروفایل</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">خروج</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
