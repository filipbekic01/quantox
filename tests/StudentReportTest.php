<?php

namespace Quantox\Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class StudentReportTest extends TestCase
{
    // Tests are hardcoded as our repository is too.
    // I hope this is enough for interview purpose.

    public function testCms()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5005/students/1');
        $this->assertEquals($response->getHeaderLine('content-type'), 'application/json');
    }

    public function testCmsb()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5005/students/2');
        $this->assertEquals($response->getHeaderLine('content-type'), 'application/xml');
    }
}
