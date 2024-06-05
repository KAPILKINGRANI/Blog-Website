<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Layouts</div>
                <a class="nav-link" href="{{ route('tags.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                    Tags
                </a>
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-gears"></i></div>
                    Categories
                </a>
                @if (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Users
                    </a>

                    <a class="nav-link" href="{{ route('comments.display') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Comments
                    </a>
                @endif
                <div class="sb-sidenav-menu-heading">Blogs</div>
                <a class="nav-link" href="{{ route('posts.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                    Posts
                </a>
                <a class="nav-link" href="{{ route('posts.trashed') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-trash"></i></div>
                    Trashed Posts
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
            {{ auth()->user()->role }}
        </div>
    </nav>
</div>
