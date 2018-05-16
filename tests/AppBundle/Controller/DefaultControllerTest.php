<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function testOther()
    {
        $controller = new DefaultController();
        $result = $controller->otherAction(1, 2);
        $this->assertEquals($result, 3);
        $result = $controller->otherAction(1);
        $this->assertEquals($result, 2);
    }
}
