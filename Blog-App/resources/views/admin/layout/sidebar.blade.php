<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">BLOG</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">CRUD</li>
            <li class="{{ request()->segment(1) == 'posts' ? 'active' : '' }}">
                <a class="nav-link" href="/posts">
                    <i class="fas fa-newspaper"></i>
                    <span>Posts</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
