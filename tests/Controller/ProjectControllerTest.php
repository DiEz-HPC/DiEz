<?php

namespace App\Tests\Controller;

use App\Controller\ProjectController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ProjectControllerTest extends WebTestCase
{
    private const PROJECT = [
        'id',
        'name',
        'description',
        'imageName',
    ];

    private function getClientAndCrawler(string $method, string $url): array
    {
        $client = static::createClient();
        $crawler =  $client->request(
            method: $method,
            uri: $url
        );
        return [
            'client' => $client,
            'crawler' => $crawler
        ];
    }

    public function testIsMethodExist() {
        $this->assertEquals(true, method_exists(ProjectController::class, 'getAllProjects'));
    }

    public function testIsSuccessFull(): void
    {
        $testUtils = $this->getClientAndCrawler(
            method: 'POST',
            url: '/api/v2/projects'
        );
        $this->assertResponseIsSuccessful();
    }

    public function testCodeIsOk (): void
    {
        $testUtils = $this->getClientAndCrawler(
            method: 'POST',
            url: '/api/v2/projects'
        );
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testResponseIsJson (): void
    {
        $testUtils = $this->getClientAndCrawler(
            method: 'POST',
            url: '/api/v2/projects'
        );
        $response = ($testUtils['client']->getResponse())->getContent();
        $this->assertJson($response);
    }

    public function testJsonIsArray (): void
    {
        $testUtils = $this->getClientAndCrawler(
            method: 'POST',
            url: '/api/v2/projects'
        );
        $response = json_decode(($testUtils['client']->getResponse())->getContent());
        $this->assertIsArray($response);
    }

    public function testIndexOfObject (): void
    {
        $testUtils = $this->getClientAndCrawler(
            method: 'POST',
            url: '/api/v2/projects'
        );

        $response = json_decode(($testUtils['client']->getResponse())->getContent());

        foreach ($response as $project) {
            foreach ($project as $index => $value)
                $this->assertEquals(true, in_array($index, self::PROJECT));
        }
    }

}
