<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BenevoleControllerTest extends WebTestCase
{
    public function testAddbenevole()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addBenevole');
    }

}
