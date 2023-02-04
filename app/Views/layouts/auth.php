<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | Management Ekskuls | SMP YANURI</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <link rel="icon" href="<?= base_url('img/logo.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/poppins.css'); ?>">
</head>

<body>

    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
</body>

</html>