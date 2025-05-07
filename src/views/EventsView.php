<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="views/styles.css">
</head>

<body>
    <?php require_once(__DIR__ . '/layouts/header.php'); ?>
    <main>
        <?php foreach ($events as $event) : ?>
            <div class="event-card">
                <div class="primary-info">
                    <h2><?= $event['name'] ?></h2>
                    <p class="price"><?= $event['price'] ?> € / jour</p>
                </div>
                <div class="secondary-info">
                    <p><strong>Date :</strong> <?= $event['date_event'] ?></p>
                    <p><strong>Catégorie :</strong> <?= $event['category_name'] ?></p>
                </div>
                <a class="cta" href="?page=booking&event_id=<?= $event['id'] ?>">Réserver</a>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>