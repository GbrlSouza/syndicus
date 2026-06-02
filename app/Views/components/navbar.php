<header class="app-navbar navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="<?= APP_URL; ?>"><?= APP_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appNavbar"
            aria-controls="appNavbar" aria-expanded="false" aria-label="Menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="appNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= APP_URL; ?>">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= APP_URL; ?>/pages/about">Sobre</a>
                </li>
            </ul>
        </div>
    </div>
</header>
