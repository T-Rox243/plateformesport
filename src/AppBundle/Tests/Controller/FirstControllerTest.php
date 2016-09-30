<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FirstControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'first');
    }

    public function testFirst()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/first');
    }

}
