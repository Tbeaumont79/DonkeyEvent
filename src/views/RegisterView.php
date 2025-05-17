<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/views/styles.css">
</head>

<body>
    <section class="register-container">
        <h1 class="title">DONKEY EVENT</h1>
        <form action="?page=register" method="POST">
            <h2 class="subtitle">Formulaire d'inscription</h2>
            <?php if (!empty($errors)) { ?>
                <div class="error-message">
                    <ul>
                        <?php
                        foreach ($errors as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php } ?>
            <input type="email" id="email" name="email" placeholder="Entrer votre e-mail">
            <input type="password" id="password" name="password" placeholder="Votre mot de passe">
            <select class="gender-select" name="gender" id="gender-select">
                <option value="">choisissez un genre</option>
                <option value="male">Homme</option>
                <option value="female">Femme</option>
            </select>
            <input type="text" name="lastname" id="lastname" placeholder="Nom">
            <input type="text" id="firstname" name="firstname" placeholder="Prenom">
            <button class="cta" name="submit" type="submit">Valider</button>
        </form>
    </section>
</body>

</html>