<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header dropdown">Books</li>
            <li class="nav-item {{ Route::is('admin.buku') ? 'active' : '' }}">
                <a href="{{route('admin.buku')}}" class="nav-link"><i class="fas fa-book"></i><span>Books</span></a>
            </li>
            <li class="nav-item {{ Route::is('admin.kategori') ? 'active' : '' }}">
                <a href="{{route('admin.kategori')}}" class="nav-link"><i class="fas fa-tag"></i><span>Books Category</span></a>
            </li>
        </ul>

    </aside>
</div>
