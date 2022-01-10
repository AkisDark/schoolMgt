<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a href="">
                    <i class="fas fa-school color-i"></i>
                    <span  class="menu-title mx-1">المؤسسة</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/school') }}"> الاعدادات </a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
           
            <li class="nav-item"><a><i class="fas fa-users-cog color-i"></i>
                <span class="menu-title mx-1">الاعضاء</span>
            
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/users') }}"> عرض الكل </a>
                    </li>
                </ul>

                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/users/create') }}"> اضافة عضو </a>
                    </li>
                </ul>

            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
           
            <li class="nav-item"><a><i class="fas fa-list-ol color-i"></i>
                <span class="menu-title mx-1">التخصصات</span>
            
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/specialties') }}"> عرض الكل </a>
                    </li>
                </ul>

                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/specialties/create') }}"> اضافة تخصص </a>
                    </li>
                </ul>

            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a href=""><i class="fas fa-book color-i"></i>
                <span class="menu-title mx-1">المواد</span>
            
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/materials') }}"> عرض الكل </a>
                    </li>

                </ul>

                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/materials/create') }}"> اضافة مادة </a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a><i class="fas fa-chalkboard color-i"></i>
                <span class="menu-title mx-1">الأقسام</span>
            
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/classes') }}"> عرض الكل </a>
                    </li>

                </ul>

                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/classes/create') }}"> اضافة قسم </a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a><i class="fas fa-chalkboard-teacher color-i"></i>
                <span class="menu-title mx-1">الأساتذة</span>
            
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/teachers') }}"> عرض الكل </a>
                    </li>

                </ul>

                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/teachers/create') }}">
                        اضافة أستاذ (ة) </a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a href=""><i class="fas fa-graduation-cap color-i"></i>
                <span class="menu-title mx-1">التلاميذ</span>
            
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/students') }}"> عرض الكل </a>
                    </li>

                </ul>

                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/students/create') }}">
                        اضافة تلميذ (ة) </a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a href=""><i class="fas fa-user-alt color-i"></i>
                <span class="menu-title mx-1">الأولياء</span>
            
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/parents') }}"> عرض الكل </a>
                    </li>

                </ul>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/parents/create') }}">
                        اضافة ولي</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a href=""><i class="fas fa-file color-i"></i>
                <span class="menu-title mx-1">الغيابات</span>
            
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/absences') }}"> عرض الكل </a>
                    </li>

                </ul>

                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('dashboard/absences/create') }}">
                        اضافة غياب</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--End Sidebare-->