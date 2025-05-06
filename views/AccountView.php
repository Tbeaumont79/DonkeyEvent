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

            <div class="infos">
                <h2 class="infosClient">Infos client</h2>
                <p class="prénom"><strong>Prénom : </strong><?php echo $_SESSION['user']['firstname']; ?></p>
                <p class="nom"><strong>nom : </strong><?php echo $_SESSION['user']['lastname']; ?></p>
                <p class="téléphone"><strong>téléphone : </strong><?php echo !isset($_SESSION['user']['phone']) ?  "Non renseigné" : $_SESSION['phone']; ?></p>
                <p class="total"><strong>Total : 200 euros</strong></p>
            </div>

        </section>
    </main>
    <footer></footer>

</body>

</html>