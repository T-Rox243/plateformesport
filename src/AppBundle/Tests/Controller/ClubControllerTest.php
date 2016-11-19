<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClubControllerTest extends WebTestCase
{
    public function testAddclub()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addClub');
    }

    public function testUpdateclub()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateClub');
    }

    public function testSearchclub()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/searchClub');
    }

}
