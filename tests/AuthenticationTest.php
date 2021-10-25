<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthenticationTest extends WebTestCase
{
    public function testAuth(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');


        $this->assertResponseRedirects();
        $client->followRedirect();


        $this->assertResponseRedirects();
        $client->followRedirect();


        $client->submitForm('Sign in', [
            'email' => 'random@yahoo.fr',
            'password' => 1234
        ]);

        $this->assertResponseRedirects();
        $client->followRedirect();


        $this->assertSelectorTextContains('body', 'Bienvenue dans le back-office de How Much!');
        
    }
}
