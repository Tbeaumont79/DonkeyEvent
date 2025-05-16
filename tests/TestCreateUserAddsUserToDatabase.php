<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Panther\PantherTestCase;
use Thibaultbeaumont\DonkeyEvent\Models\UserModel;

class TestCreateUserAddsUserToDatabase extends PantherTestCase
{

    public function testCreateUser()
    {
        $email = 'tbeaumont89@icloud.com';
        $pdo = new \PDO('mysql:host=localhost;dbname=donkeyevent', 'root', '');
        // Nettoyage avant le test
        $pdo->prepare('DELETE FROM users WHERE email = ?')->execute([$email]);

        $client = static::createPantherClient([
            'webServerDir' => __DIR__ . '/..'
        ]);
        $client->request('GET', 'http://localhost:8000/index.php?page=register');
        $client->submitForm('Valider', [
            "email" => $email,
            "password" => "test123123",
            "gender" => "male",
            "lastname" => "thibault",
            "firstname" => "beaumont"
        ]);
        $userModel = new \Thibaultbeaumont\DonkeyEvent\Models\UserModel($pdo);
        $user = $userModel->readByEmail($email);
        $this->assertNotNull($user, "L'utilisateur n'a pas été créé en base de données.");
        $this->assertStringContainsString('index.php?page=login', $client->getCurrentURL());
        $pdo->prepare('DELETE FROM users WHERE email = ?')->execute([$email]);
    }
}
