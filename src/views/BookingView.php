<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/views/styles.css">
</head>

<body>
    <?php require_once('layouts/header.php'); ?>
    <main class="booking-view">
        <section class="event-and-options">
            <div class="event-card">
                <div class="primary-info">
                    <h2><?= $eventDetails["name"] ?></h2>
                    <p class="price"><?= $eventDetails["price"] ?> € / jour</p>
                </div>
                <div class="secondary-info">
                    <p class="date"><strong>Date : <?= $eventDetails["date_event"] ?></strong></p>
                    <p class="catégorie"><strong>Catégorie :</strong> <?= $categoryName ?></p>
                </div>
            </div>
            <div class="options-form">
                <form method="post" action="/?page=bookedevents">
                    <?php foreach ($options as $option) : ?>
                        <label for="<?= $option['id'] ?>"><?= $option['name'] ?> <span><?= $option['price'] ?> euros</span>:</label>
                        <input type="checkbox" id="<?= $option['id'] ?>" name="option[<?= $option['id'] ?>]" value="<?= $option['price'] ?>">
                    <?php endforeach; ?>
                    <input type="hidden" name="event_id" value="<?= $eventDetails['id'] ?>">
                    <input type="hidden" name="event_date" value="<?= $eventDetails['date_event'] ?>">
                    <input type="hidden" name="event_name" value="<?= $eventDetails['name'] ?>">
                    <input type="hidden" name="event_id" value="<?= $eventDetails['id'] ?>">
                    <button type="submit" class="cta">Réserver</button>
                </form>
            </div>
        </section>
        <section class="client-infos">
            <div>
                <h2 class="">Infos client</h2>
                <p><strong>Prénom : </strong><?php echo $_SESSION['user']['firstname']; ?></p>
                <p><strong>nom : </strong><?php echo $_SESSION['user']['lastname']; ?></p>
                <p><strong>téléphone : </strong><?php echo !isset($_SESSION['user']['phone']) ?  "Non renseigné" : $_SESSION['phone']; ?></p>
                <p class="price"><strong>Total : 200 euros</strong></p>
            </div>
        </section>
    </main>
    <footer></footer>
</body>

</html>