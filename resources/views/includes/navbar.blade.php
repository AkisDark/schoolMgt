<!-- Begin Header -->
<nav
    style="background:#2C3A47"class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                    class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('dashboard/school') }}">
                        <img class="brand-logo" alt="modern admin logo"
                             src="{{ url('admin/images/logo/logo.png') }}">
                        <h3 class="brand-text">تسيير المدارس</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                        class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                        class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1"> مرحـبا :
                  <span
                      class="user-name text-bold-500">  
                                        @auth
                                            {{ auth()->user()->username }}
                                        @endauth  
                  </span>
                </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('users.profile') }}">
                                <i  class="far fa-address-card mx-1"></i> حسابي </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('dashboard/users/logout') }}">
                                <i class="ft-power"></i> 
                                تسجيل
                                الخروج 
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<!--End  Header -->