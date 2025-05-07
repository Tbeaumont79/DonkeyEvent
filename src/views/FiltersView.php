<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrer les événements</title>
    <link rel="stylesheet" href="views/styles.css">
</head>

<body>
    <?php require_once(__DIR__ . '/layouts/header.php'); ?>
    <section class="find-event-container">
        <h2>Trouvez un événement</h2>
        <form class="vertical-form" method="post" action="/?page=events">
            <select name="city" id="city-select">
                <option value="">Ville</option>
                <?php foreach ($cities as $city) : ?>
                    <option value="<?= $city['name'] ?>"><?= $city['name'] ?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="date" id="date_event" name="date" placeholder="Date d'événement"><br>
            <select name="category">
                <option value="">Catégorie</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="cta">Je valide</button>
        </form>
    </section>
    <footer class="footer-filters">
    </footer>
</body>

</html>