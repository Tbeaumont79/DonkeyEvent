<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrer les événements</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <header>
        <div class="header-container">
            <span>M. Dupont Durand</span>
            <nav class="header-nav">
                <a href="#">Mon compte</a>
                <a href="#">Mes réservations</a>
                <a href="#">Trouver un évènement</a>
                <a href="#" class="logout">Déconnexion</a>                
            </nav>
        </div>
    </header>

    <section class="page-title">
        <h1>DONKEY EVENT</h1>
    </section>


    <section class="find-event-container">
        <div class="h2-and-form">
            <h2>Trouvez un événement</h2>
            <form class="vertical-form" method="post" action="#">
                <select name="city" id="city-select">
                    <option value="">Ville</option>
                    <option value="paris">Paris</option>
                    <option value="marseille">Marseille</option>
                    <option value="lyon">Lyon</option>
                </select><br>

                <input type="date" id="date_event" name="date" placeholder="Date d'événement"><br>

                <select name="category">
                    <option value="">Catégorie</option>
                    <option value="Art">Art</option>
                    <option value="Art urbain">Art urbain</option>
                    <option value="Vernissage">Vernissage</option>
                    <option value="Sport et art">Sport et art</option>
                </select>

                <button type="submit">Je valide</button>

            </form>
        </div>
        

    </section>

    <footer class="footer-filters">

    </footer>


</body>
</html>