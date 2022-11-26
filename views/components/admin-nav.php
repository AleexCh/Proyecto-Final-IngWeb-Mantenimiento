<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Panel de Administración</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú de Opciones</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end gap-4">
                    <li class="nav-item text-center">
                        <a href="/admin" class="nav-link <?php echo (isset($active) && $active == 'dashboard') ? 'active fw-bolder' : ''; ?>" aria-current="page">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="btn btn-light text-center text-uppercase w-100">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>