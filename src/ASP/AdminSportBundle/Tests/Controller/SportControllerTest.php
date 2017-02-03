<?php

namespace ASP\AdminSportBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SportControllerTest extends WebTestCase
{
    public function testAdminsport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/adminSport');
    }

}
