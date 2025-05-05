<?php
if (!session_start() || !isset($_SESSION['user'])) {
    header('Location: /?page=login');
}
$navElement = [
    'Mon Compte' => '/?page=account',
    'Mes réservations' => '/?page=reservations',
    'Trouver un évènement' => '/?page=events',
];
$title = "DONKEYEVENT";
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
<h1 class="page-title">DONKEY EVENT</h1>
