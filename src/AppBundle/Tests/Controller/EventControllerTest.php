<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventControllerTest extends WebTestCase
{
    public function testAddevent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addEvent');
    }

    public function testUpdateevent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateEvent');
    }

    public function testSearchevent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/searchEvent');
    }

}
