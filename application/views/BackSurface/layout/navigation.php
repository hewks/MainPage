<!-- Header -->
<header>

    <div class="bs-navigation">

        <a href="#" class="bs-nav-brand">
            BackSurface
        </a>

        <div class="bs-nav-left-content">
            <button class="bs-nav-toggler" id="bs-sidebar-toggler-btn">
                <i class="fas fa-bars"></i>
            </button>

            <div class="bs-nav-user">
                <a href="#">Username</a>
            </div>
        </div>

    </div>

    <div id="bs-main-sidebar" class="bs-sidebar">
        <div class="bs-sidebar-separator">
            <span class="bs-sidebar-separator-title">Usuarios</span>
        </div>
        <a href="<?= base_url() ?>BackSurface/Customers" class="bs-sidebar-block-a">Clientes</a>
        <a href="<?= base_url() ?>BackSurface/Requests" class="bs-sidebar-block-a">Peticiones</a>
        <div class="bs-sidebar-separator">
            <span class="bs-sidebar-separator-title">Configuracion</span>
        </div>
        <a href="<?= base_url() ?>BackSurface/Administrators" class="bs-sidebar-block-a">Administradores</a>
        <a href="<?= base_url() ?>BackSurface/Errors" class="bs-sidebar-block-a">Errores</a>
    </div>

</header>
<!-- Header -->