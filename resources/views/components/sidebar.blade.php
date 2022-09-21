<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Simple Blog</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="">
                <a class="nav-link"
                   href="{{ route('home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>

            <li class="menu-header">Blog Management</li>
            <li class="">
                <a class="nav-link"
                   href="#"><i class="far fa-square"></i> <span>Category</span></a>
            </li>
            <li class="">
                <a class="nav-link"
                   href="#"><i class="far fa-square"></i> <span>Tags</span></a>
            </li>
            <li class="">
                <a class="nav-link"
                   href="#"><i class="far fa-square"></i> <span>Post</span></a>
            </li>

            <li class="menu-header">User Management</li>
            <li class="">
                <a class="nav-link"
                   href="{{ route('role.index') }}"><i class="far fa-square"></i> <span>Role</span></a>
            </li>
            <li class="">
                <a class="nav-link"
                   href="{{ route('user.index') }}"><i class="far fa-square"></i> <span>Users</span></a>
            </li>
        </ul>
    </aside>
</div>
