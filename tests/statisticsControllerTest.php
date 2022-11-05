<?php
namespace App\Tests;


use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class statisticsControllerTest extends  TestCase
{
    public function  testStatistics()
    {
        $url = '/statistics';
        $client = new Client([
            'base_uri' => 'http://fizzbuzz',
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        $response = $client->request('GET', $url);
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('parameters', $data);
        $this->assertArrayHasKey('count', $data);

    }
}