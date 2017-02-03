<?php

namespace ASP\AdminSportBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClubControllerTest extends WebTestCase
{
    public function testAdminclub()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/adminClub');
    }

}
