<?php

namespace ASP\AdminSportBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventControllerTest extends WebTestCase
{
    public function testAdminevent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/adminEvent');
    }

}
