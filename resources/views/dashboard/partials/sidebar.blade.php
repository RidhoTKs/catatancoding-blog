<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/post*') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/post">
                    <span data-feather="file-text"></span>
                    Post
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/category">
                    <span data-feather="grid"></span>
                    Category
                </a>
            </li>
        </ul>
    </div>
</nav>
