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
    <main>
        <section class="client-infos">
            <div class="primary-info">
                <h2>Infos client</h2>

                <p><strong>Prénom : </strong><?php echo $_SESSION['user']['firstname']; ?></p>
                <p><strong>nom : </strong><?php echo $_SESSION['user']['lastname']; ?></p>
            </div>
            <div class="secondary-info">
                <p><strong>téléphone : </strong><?php echo !isset($_SESSION['user']['phone']) ?  "Non renseigné" : $_SESSION['phone']; ?></p>
                <p><strong>Total : 200 euros</strong></p>
            </div>
        </section>
    </main>
    <footer></footer>
</body>

</html>