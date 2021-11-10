<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Pawsome' ?></title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon.png">
</head>
<body>

    <?php include_once  BASE_DIR . '/views/_templates/_partials/header.php'; ?>
    
    <main>
        <?= $content; ?>
    </main>

    <?php include_once  BASE_DIR . '/views/_templates/_partials/footer.php'; ?>

</body>
</html>