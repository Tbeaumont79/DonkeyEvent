<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bodyListe">
    <?php require_once('./layouts/header.php'); ?>
    <main>
        <section class="container2">
            <div class="carte">
                <h2 class="titreCarte">FESTI ART</h2>
                <p class="prix">200 € / jour</p>
                <p class="date"><strong>Date : Lundi</strong> 28 avril 2025</p>
                <p class="catégorie"><strong>Catégorie :</strong> Art urbain</p>
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
                <div>
                    <input type="checkbox" id="checkboxOptions" name="checkboxOptions">
                    <label for="checkboxOptions">accès au bar <span>15euros :</span></label>
                </div>
                <div>
                    <input type="checkbox" id="checkboxOptions" name="checkboxOptions">
                    <label for="checkboxOptions">Atelier peinture : <span>45 euros/ jour</span></label>
                </div>
                <div>
                    <input type="checkbox" id="checkboxOptions" name="checkboxOptions">
                    <label for="checkboxOptions">Place VIP Concert : <span>20€/ jour</span></label>
                </div>
            </form>
        </section>

    </main>
    <footer></footer>

</body>

</html>