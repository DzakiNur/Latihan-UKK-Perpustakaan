<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}">Perpustakaan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin.dashboard')}}">PS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header dropdown">Books</li>
            <li class="nav-item {{ Route::is('admin.book') || Route::is('admin.add-book') ? 'active' : '' }}">
                <a href="{{route('admin.book')}}" class="nav-link"><i class="fas fa-book"></i><span>Books</span></a>
            </li>
            @if(Auth::user()->role == 'admin')
            <li class="nav-item {{ Route::is('admin.category') ? 'active' : '' }}">
                <a href="{{route('admin.category')}}" class="nav-link"><i class="fas fa-tag"></i><span>Categories</span></a>
            </li>
            <li class="menu-header">Users</li>
            <li class="nav-item {{ Route::is('admin.user') ? 'active' : '' }}">
                <a href="{{route('admin.user')}}" class="nav-link"><i class="far fa-user"></i><span>Users</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 'user')
            <li class="nav-item {{ Route::is('admin.collection') ? 'active' : '' }}">
                <a href="{{route('admin.collection')}}" class="nav-link"><i class="fas fa-tag"></i><span>Collections</span></a>
            </li>
            <li class="menu-header">Borrowing</li>
            <li class="nav-item {{ Route::is('admin.borrow') ? 'active' : '' }}">
                <a href="{{route('admin.borrow')}}" class="nav-link"><i class="far fa-user"></i><span>Borrow</span></a>
            </li>
            @endif
        </ul>

    </aside>
</div>
