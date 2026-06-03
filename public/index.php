<?php
include './../app/settings.php';
include './../app/Libraries/Routs.php';
include './../app/Libraries/Controller.php';
include './../app/Libraries/DataBase.php';
?>

<!DOCTYPE html>
<html lang="<?= APP_LANGUAGES; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= APP_URL; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?= APP_URL; ?>/img/favicon.svg" type="image/svg+xml">

    <title><?= APP_NAME; ?></title>
</head>

<body class="app-body">
    <?php require APP_ROOT . '/Views/components/navbar.php'; ?>

    <div class="app-layout">
        <?php require APP_ROOT . '/Views/components/sidebar.php'; ?>

        <main class="app-main">
            <?php new Routs(); ?>
        </main>
    </div>

    <?php require APP_ROOT . '/Views/components/footer.php'; ?>

    <script src="<?= APP_URL; ?>/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
