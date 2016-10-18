<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'userTest');
    }

    public function testSignin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/signIn');
    }

    public function testSignup()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/signUp');
    }

}
