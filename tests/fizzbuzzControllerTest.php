<?php
 namespace App\Tests;


 use GuzzleHttp\Client;
 use GuzzleHttp\Handler\MockHandler;
 use GuzzleHttp\HandlerStack;
 use GuzzleHttp\Psr7\Response;
 use GuzzleHttp\Psr7\Request;
 use GuzzleHttp\Exception\RequestException;
 use PHPUnit\Framework\TestCase;

 class fizzbuzzControllerTest extends  TestCase
 {


    public function  testBasicFizzbuzz() : void
    {

        $int1 = 3;
        $int2 = 4;
        $limit = 15;
        $word1 = "fizz";
        $word2 = "buzz";
        $dataExpected = "12fizzbuzz5fizz7buzzfizz1011fizzbuzz1314";

        $url = "?int1=$int1&int2=$int2&limit=$limit&word1=$word1&word2=$word2";
        $client = new Client([
            'base_uri' => 'http://fizzbuzz',
            'defaults' => [
            'exceptions' => false
            ]
        ]);
        $response = $client->request('GET', $url);
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('fizzbuzz', $data);
        $this->assertEquals($dataExpected, $data['fizzbuzz']);

    }

     public function  testLongFizzbuzz() :void
     {
         $int1 = 3;
         $int2 = 8;
         $limit = 200;
         $word1 = "fizz";
         $word2 = "buzz";
         $dataExpected = "12fizz45fizz7buzzfizz1011fizz1314fizzbuzz17fizz1920fizz2223fizzbuzz2526fizz2829fizz31buzzfizz3435fizz3738fizzbuzz41fizz4344fizz4647fizzbuzz4950fizz5253fizz55buzzfizz5859fizz6162fizzbuzz65fizz6768fizz7071fizzbuzz7374fizz7677fizz79buzzfizz8283fizz8586fizzbuzz89fizz9192fizz9495fizzbuzz9798fizz100101fizz103buzzfizz106107fizz109110fizzbuzz113fizz115116fizz118119fizzbuzz121122fizz124125fizz127buzzfizz130131fizz133134fizzbuzz137fizz139140fizz142143fizzbuzz145146fizz148149fizz151buzzfizz154155fizz157158fizzbuzz161fizz163164fizz166167fizzbuzz169170fizz172173fizz175buzzfizz178179fizz181182fizzbuzz185fizz187188fizz190191fizzbuzz193194fizz196197fizz199";

         $url = "?int1=$int1&int2=$int2&limit=$limit&word1=$word1&word2=$word2";
         $client = new Client([
             'base_uri' => 'http://fizzbuzz',
             'defaults' => [
                 'exceptions' => false
             ]
         ]);
         $response = $client->request('GET', $url);
         $this->assertEquals(200, $response->getStatusCode());
         $data = json_decode($response->getBody(), true);
         $this->assertArrayHasKey('fizzbuzz', $data);
         $this->assertEquals($dataExpected, $data['fizzbuzz']);
     }
 }