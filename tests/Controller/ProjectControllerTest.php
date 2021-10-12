<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ProjectControllerTest extends WebTestCase
{
    public function testIsSuccessFull(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/v2/projects');

        $this->assertResponseIsSuccessful();
    }

    public function testCodeIsOk (): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/v2/projects');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testResponseIsJson (): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/v2/projects');
        $response = ($client->getResponse())->getContent();
        $this->assertJson($response);
    }

}
