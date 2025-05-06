<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="views/styles.css">
</head>

<body class="bodyListe">
    <?php require_once(__DIR__ . '/layouts/header.php'); ?>
    <main>
        <?php foreach ($events as $event) : ?>
            <div class="carte">
                <h2 class="titreCarte"><?= $event['name'] ?></h2>
                <p class="prix"><?= $event['price'] ?> € / jour</p>
                <p class="date"><strong>Date : <?= $event['date_event'] ?></strong></p>
                <p class="catégorie"><strong>Catégorie :</strong> <?= $event['category_name'] ?></p>
                <div class="boutonRéserver">
                    <a href="?page=booking&event_id=<?= $event['id'] ?>" class="button">Réserver</a>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>