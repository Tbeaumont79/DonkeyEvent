<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/src/views/styles.css">
</head>

<body>
    <main>
        <section class="login-container">
            <h1 class="title">DONKEY EVENT</h1>
            <form class="form-login" action="?page=login" method="post">
                <?php if (!empty($errors)) { ?>
                    <div class="error-message">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php } ?>
                <input type="email" id="email" name="email" placeholder="Entrer votre e-mail">
                <input type="password" id="password" name="password" placeholder="Votre mot de passe">
                <button class="cta" type="submit">Connexion</button>
                <p>Vous n'avez pas de compte ? <a href="?page=register">inscrivez-vous</a> !</p>
            </form>
        </section>
    </main>
</body>

</html>