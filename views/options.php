<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bodyListe">
    <header>
            <div class="container">
                <p class="user">Mr Dupont Durand</p>
                <nav>
                <a href="">Mon compte</a>
                <a href="">Mes réservations</a>
                <a href="">Trouver un évènement</a>
                </nav>
                <a class="lienConnexion"  href="login.php">Déconnexion</a>
            </div>
            <h1 class="titre">DONKEY EVENT</h1>
    </header>
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
                <input type="checkbox" id="checkboxOptions" name="checkboxOptions">
                <label for="checkboxOptions">accès au bar <span>15euros</span>:</label>
            </form>
        </section>
    
    </main>
    <footer></footer>

</body>
</html>