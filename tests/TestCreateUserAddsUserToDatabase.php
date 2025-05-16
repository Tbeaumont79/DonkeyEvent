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
        $this->assertStringContainsString('/index.php?page=login', $client->getCurrentURL());
    }
}
