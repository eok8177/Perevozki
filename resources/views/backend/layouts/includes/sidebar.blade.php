<div id="sidebar-collapse">
    <div class="admin-block d-flex">
        <div>
            <img src="{{ asset('backend/img/admin-avatar.png') }}" width="45px" />
        </div>
        <div class="admin-info">
            <div class="font-strong">James Brown</div><small>Administrator</small></div>
    </div>
    <ul class="side-menu metismenu">
        {{-- <li>
            <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </li> --}}
        <li class="heading">Menu</li>
        <li>
            <a href="/admin/pages/statics">
                <i class="sidebar-item-icon fa fa-newspaper-o"></i>
                <span class="nav-label">Страницы</span>
            </a>
        </li>
        <li>
            <a href="/admin/pages/services">
                <i class="sidebar-item-icon fa fa-truck"></i>
                <span class="nav-label">Услуги</span>
            </a>
        </li>
        <li>
            <a href="/admin/pages/cars">
                <i class="sidebar-item-icon fa fa-car"></i>
                <span class="nav-label">Машины</span>
            </a>
        </li>
        <li>
            <a href="/admin/reviews">
                <i class="sidebar-item-icon fa fa-comments-o"></i>
                <span class="nav-label">Отзывы</span>
            </a>
        </li>
        <li>
            {{-- <a href="javascript:;"> --}}
                {{-- <i class="sidebar-item-icon fa fa-archive"></i> --}}
                {{-- <span class="nav-label">Catalog</span><i class="fa fa-angle-left arrow"></i> --}}
            {{-- </a> --}}
            {{-- <ul class="nav-2-level collapse"> --}}
{{--                 <li>
                    <a href="/admin/categories">Categories</a>
                </li> --}}
                {{-- <li> --}}
                    <a href="/admin/posts">
                        <i class="sidebar-item-icon fa fa-file-text-o"></i>
                        <span class="nav-label">Советы</span>
                    </a>
                {{-- </li> --}}
            {{-- </ul> --}}
        </li>
        <li>
            <a href="javascript:;">
                <i class="sidebar-item-icon fa fa-cogs"></i>
                <span class="nav-label">Options</span><i class="fa fa-angle-left arrow"></i>
            </a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="/admin/settings">Settings</a>
                </li>
                <li>
                    <a href="/admin/language">Language</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="sidebar-item-icon fa fa-users"></i>
                <span class="nav-label">Users</span><i class="fa fa-angle-left arrow"></i>
            </a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="/admin/users">Users</a>
                </li>
                <li>
                    <a href="/admin/roles">Roles</a>
                </li>
            </ul>
        </li>
    </ul>
</div>