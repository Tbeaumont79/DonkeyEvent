<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Donkey Event</title>
</head>
<body>
    <section>
    <div>
    <h1>Connexion Donkey Event</h1>
    </div>

    <div>
    <form action="loginController.php" method="POST">
        <label for="email">Entrez votre e-mail :</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Votre mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Connexion</button>
    </form>
    </div>

    <div>
        <p>Vous n’avez pas de compte ? <a href="registerController.php">Inscrivez-vous !</a></p>
    </div>
    </section>

 




</body>
</html>

<?php

?>
