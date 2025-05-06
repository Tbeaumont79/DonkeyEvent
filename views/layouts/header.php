<?php

$navElement = [
    'Mon Compte' => '/?page=account',
    'Mes réservations' => '/?page=bookedevents',
    'Trouver un évènement' => '/?page=filters',
];
$title = "DONKEYEVENT";
if ($_SESSION['user']['id'] == null || !isset($_SESSION['user'])) {
    header('Location: /index.php?page=login');
    exit();
} else {
    $username = $_SESSION['user']['gender'] === "female" ? 'Mme ' . $_SESSION['user']['lastname'] . ' ' . $_SESSION['user']['firstname'] : 'Mr ' . $_SESSION['user']['lastname'] . ' ' . $_SESSION['user']['firstname'];
?>
    <header>
        <div class="header-container">
            <span class="user"><?php echo $username ?></span>
            <nav class="header-nav">
                <?php foreach ($navElement as $name => $link): ?>
                    <a href="<?= $link ?>"><?= $name ?></a>
                <?php endforeach; ?>
            </nav>
            <a href="/?page=logout" class="header-button lienConnexion">Déconnexion</a>
        </div>
    </header>
<?php } ?>