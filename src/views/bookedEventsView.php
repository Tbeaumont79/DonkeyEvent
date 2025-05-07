<?php
$edit = false;
if (isset($_POST['edit'])) {
    $edit = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes réservations</title>
    <link rel="stylesheet" href="src/views/styles.css">

</head>

<body>
    <?php require_once(__DIR__ . '/layouts/header.php'); ?>
    <main class="main-booking">
        <section class="booking-container">
            <div class="h2-and-table">
                <h2 class="subtitle">Mes réservations</h2>
                <table>
                    <tr>
                        <th>Ville</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    <form method="post" action="/?page=bookedevents">

                        <?php if (isset($bookedEvents) && $bookedEvents != null) { ?>
                            <?php foreach ($bookedEvents as $event) : ?>
                                <tr>
                                    <td><?= $edit == false ? $event['city_name'] : '<input type="text" name="city_name" value="' . $event['city_name'] . '">' ?></td>
                                    <td><?= $edit == false ? $event['event_name'] : '<input type="text" name="event_name" value="' . $event['event_name'] . '">' ?></td>
                                    <td><?= $edit == false ? $event['booking_date'] : '<input type="text" name="booking_date" value="' . $event['booking_date'] . '">' ?></td>
                                    <td>
                                        <nav class="nav-booking">
                                            <?php echo $edit == false ?  '<button type="submit" name="edit">Modifier</button>' : '<button type="submit" name="save">Enregistrer</button>' ?>
                                            <a href="/?page=bookedevents&event_id=<?= $event['event_id'] ?>">Annuler</a>
                                        </nav>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>
                    </form>
                </table>
            </div>
        </section>
    </main>
    <footer class="footer-booking">
    </footer>
</body>

</html>