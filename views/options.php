<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="views/styles.css">
</head>

<body class="bodyListe">
    <?php require_once('layouts/header.php'); ?>
    <section class="page-title">
        <h1>DONKEY EVENT</h1>
    </section>
    <main>
        <section class="container2">
            <div class="carte">
                <h2 class="titreCarte"><?= $eventDetails["name"] ?></h2>
                <p class="prix"><?= $eventDetails["price"] ?> € / jour</p>
                <p class="date"><strong>Date : <?= $eventDetails["date_event"] ?></strong></p>
                <p class="catégorie"><strong>Catégorie :</strong> <?= $categoryName ?></p>
                <div class="boutonRéserver">
                    <button class="réserver">Réserver</button>
                </div>
            </div>
            <div class="infos">
                <h2 class="infosClient">Infos client</h2>
                <p class="prénom"><strong>Prénom : </strong>Dupont</p>
                <p class="nom"><strong>nom : </strong>Durant</p>
                <p class="téléphone"><strong>téléphone : </strong>06 22 22 22 22</p>
                <p class="total"><strong>Total : 200 euros</strong></p>
            </div>

        </section>
        <section class="options">
            <form class="optionsForm" action="" method="post">
                <input type="checkbox" id="checkboxOptions" name="checkboxOptions">
                <label for="checkboxOptions">accès au bar <span>15euros</span>:</label>
            </form>
        </section>

    </main>
    <footer></footer>

</body>

</html>