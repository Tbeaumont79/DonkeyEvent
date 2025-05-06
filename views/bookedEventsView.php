<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes réservations</title>
    <link rel="stylesheet" href="views/styles1.css">

</head>

<body>
    <?php require_once(__DIR__ . '/layouts/header.php'); ?>

    <section class="page-title">
        <h1>DONKEY EVENT</h1>
    </section>

    <section class="reservations-container">
        <div class="h2-and-table">
            <h2>Mes réservations</h2>
            <table>
                <tr>
                    <th>Ville</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                <?php if (isset($bookedEvents) && $bookedEvents != null) { ?>
                    <?php foreach ($bookedEvents as $event) : ?>
                        <td><?= $event['city_name'] != null ? $event['city_name'] : 'Aucune ville' ?></td>
                        <td><?= $event['event_name'] != null ? $event['event_name'] : 'Aucun event' ?></td>
                        <td><?= $event['booking_date'] != null ? $event['booking_date'] : 'Aucune date' ?></td>
                        <td>
                            <nav class="nav-booking">
                                <a href="#">Modifier</a>
                                <a href="/?page=bookedevents&event_id=<?= $event['event_id'] ?>">Annuler</a>
                            </nav>
                        </td>
                    <?php endforeach; ?>
                <?php } ?>
                </tr>
            </table>
        </div>
    </section>
    <footer class="footer-booking">
    </footer>
</body>

</html>