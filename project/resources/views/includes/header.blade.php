<header id="header" class="header-size-sm border-bottom-0">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-lg-between">

                <!-- Logo
                ============================================= -->
                <div id="logo" class="mx-auto col-auto flex-column order-2">
                    <a href="{{ route('home') }}" class="standard-logo"><img src="{{ asset('assets/images/logos/logo.png') }}" alt="AGRIMA LOGO"></a>
                    <a href="{{ route('home') }}" class="retina-logo"><img src="{{ asset('assets/images/logos/logo.png') }}" alt="AGRIMA LOGO"></a>
                </div><!-- #logo end -->

                <div class="header-misc col-auto col-lg-3 order-3 justify-content-lg-end ms-0 ms-sm-3 px-0">

                    <!-- Top Cart
                    ============================================= -->
                    <div class="header-misc-icon">
                        <a href="{{ route('cart') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48Z" opacity="0.2"></path><path d="M184,184H69.81818L41.92162,30.56892A8,8,0,0,0,34.05066,24H16" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path><circle cx="80" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><circle cx="184" cy="204" r="20" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><path d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></svg>

                            <span id="header-total-quantity" class="top-cart-number">{{ $totalCartQuantity ?? 0 }}</span>
                        </a>
                    </div><!-- #top-cart end -->

                    <!-- Account
                    ============================================= -->
                    
                    
                    <div class="header-misc-icon">
                        <div class="dropdown">
                            <span class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="icon-user-alt"></i>
                            </span>
                            <ul class="dropdown-menu">

                                @guest
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                @else
                                    <li><a class="dropdown-item disabled" href="#"><small>
                                        {{ auth()->user()->name }} :&nbsp;
                                        @if (auth()->user()->role->name == 'Seller')
                                            Farmer
                                        @elseif(auth()->user()->role->name == 'Buyer')
                                            Vendor
                                        @else
                                            Admin    
                                        @endif
                                    </small></a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>

                                    @if (auth()->user()->inRole(['administrator']))
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @endif

                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-line2-logout"></i>  &nbsp; Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                                
                            </ul>
                        </div>
                    </div>

                    <!-- #account end -->

                </div>

                <!-- Mobile Menu Icon
                ============================================= -->
                <div id="primary-menu-trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><defs><style>.a,.c{fill:none;}.b{fill:var(--themecolor);opacity:0.2;}.c,.d{stroke:var(--themecolor);}.c{stroke-miterlimit:10;stroke-width:14px;}.d{stroke-linecap:round;stroke-linejoin:round;stroke-width:13px;}</style></defs><rect class="a" width="24" height="24"/><circle class="b" cx="96" cy="96" r="96" transform="translate(32 32)"/><circle class="c" cx="96" cy="96" r="96" transform="translate(32 32)"/><line class="d" x2="85" transform="translate(86 127)"/><line class="d" x2="85" transform="translate(86 97)"/><line class="d" x2="85" transform="translate(86 159)"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="128" r="96" opacity="0.2"></circle><circle cx="128" cy="128" r="96" fill="none" stroke="var(--themecolor)" stroke-miterlimit="10" stroke-width="16"></circle><line x1="160" y1="96" x2="96" y2="160" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><line x1="160" y1="160" x2="96" y2="96" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu with-arrows order-lg-1 order-last px-0">

                    <ul class="menu-container">
                        <li class="menu-item current">
                            <a class="menu-link" href="{{ route('home') }}">
                                <div>Home</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('about') }}">
                                <div>About Us</div>
                            </a>
                        </li>
                        <li class="menu-item mega-menu mega-menu-full">
                            <a href="{{ route('shop') }}" class="menu-link"><div>Shop</div></a>

                            <!-- Menu DropDown
                            ============================================= -->
                            <div class="mega-menu-content border-bottom-0">
                                <div class="container">
                                    <div class="row">
                                        @forelse ($categories as $category)
                                            <ul class="sub-menu-container mega-menu-column col-lg-auto">
                                                <li class="menu-item">
                                                    <a class="menu-link" href="{{ route('category',$category) }}"><div>{{ $category->name }}</div></a>
                                                    <ul class="sub-menu-container mega-menu-dropdown">
                                                        @forelse ($category->subCategories as $subCategory)
                                                            <li class="menu-item">
                                                                <a class="menu-link" href="{{ route('sub-category',$subCategory) }}"><div>{{ $subCategory->name }}</div></a>
                                                            </li>
                                                        @empty
                                                            
                                                        @endforelse
                                                    </ul>
                                                </li>
                                            </ul>
                                        @empty
                                            
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('insights') }}">
                                <div>Insights</div>
                            </a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="{{ route('contact') }}">
                            <div>Contact</div>
                        </a></li>
                    </ul>

                </nav><!-- #primary-menu end -->

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>