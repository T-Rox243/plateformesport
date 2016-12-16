<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SportControllerTest extends WebTestCase
{
    public function testListsport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listSports');
    }

    public function testSport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/sport/{idSport}');
    }

    public function testEditsport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editSport/{idSport}');
    }

    public function testSearchsport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/searchSport');
    }

}
