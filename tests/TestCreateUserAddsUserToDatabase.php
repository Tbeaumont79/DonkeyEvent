<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Panther\PantherTestCase;
use Thibaultbeaumont\DonkeyEvent\Models\UserModel;

class TestCreateUserAddsUserToDatabase extends PantherTestCase
{

    public function testCreateUser()
    {
        $client = static::createPantherClient([
            'webServerDir' => __DIR__ . '/..'
        ]);
        $crawler = $client->request('GET', 'http://localhost:8000/index.php?page=register');
        $crawler = $client->submitForm('Valider', [
            "email" => "tbeaumont89@icloud.com",
            "password" => "test123123",
            "gender" => "male",
            "lastname" => "thibault",
            "firstname" => "beaumont"
        ]);
        $pdo = new \PDO('mysql:host=localhost;dbname=donkeyevent', 'root', '');
        $userModel = new \Thibaultbeaumont\DonkeyEvent\Models\UserModel($pdo);
        $user = $userModel->readByEmail("tbeaumont89@icloud.com");

        $this->assertNotNull($user, "L'utilisateur n'a pas été créé en base de données.");
        $this->assertStringContainsString('index.php?page=login', $client->getCurrentURL());
    }
}
