<!-- Header -->
<header>

    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg top-navigation" id="top-navigation">

        <a class="navbar-brand" href="<?= base_url() ?>">Hewks</a>

        <button id="sidebar-toggler-btn" class="sidebar-toggler-btn"><i class="fas fa-bars"></i></button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url() ?>DesarrolloWeb">Desarrollo Web</a>
                        <a class="dropdown-item" href="<?= base_url() ?>DesarrolloSoftware">Desarrollo de Software</a>
                        <a class="dropdown-item" href="<?= base_url() ?>ProduccionAudiovisual">Producci&oacute;n Audiovisual</a>
                        <a class="dropdown-item" href="<?= base_url() ?>MarketingDigital">Marketing Digital</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>Galeria">Galeria</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-toggle="modal" data-target="#choose-your-page">Contacto</button>
                </li>
            </ul>
        </div>

    </nav>
    <!-- /Top Navigation -->

    <!-- Main Sidebar -->
    <div class="main-sidebar" id="main-sidebar">

        <div class="sidebar-block sidebar-top-logo">
            <span>Hewks</span>
        </div>

        <div class="sidebar-block">
            <a href="<?= base_url() ?>" class="sidebar-block-title">Inicio</a>
        </div>
        <div class="sidebar-block">
            <a href="#" class="sidebar-block-title sidebar-block-toggler" data-target="servicesSidebarBlock">Servicios</a>
            <ul class="sidebar-toggle-block" id="servicesSidebarBlock">
                <li><a href="<?= base_url() ?>DesarrolloWeb">Desarrollo Web</a></li>
                <li><a href="<?= base_url() ?>DesarrolloSoftware">Desarrollo de Software</a></li>
                <li><a href="<?= base_url() ?>ProduccionAudiovisual">Producci&oacute;n Audiovisual</a></li>
                <li><a href="<?= base_url() ?>MarketingDigital">Marketing Digital</a></li>
            </ul>
        </div>
        <div class="sidebar-block">
            <a href="<?= base_url() ?>Galeria" class="sidebar-block-title">Galeria</a>
        </div>
        <div class="sidebar-block">
            <a href="#" class="sidebar-block-title" data-toggle="modal" data-target="#choose-your-page">Contacto</a>
        </div>

    </div>
    <!-- /Main Sidebar -->

</header>
<!-- Header -->