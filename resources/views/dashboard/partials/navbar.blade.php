<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard/post">Catatan Coding</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/admin-logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 btn-dark border-0">Log Out <span
                        data-feather="log-out"></span></button>
            </form>
        </div>
    </div>
</header>
