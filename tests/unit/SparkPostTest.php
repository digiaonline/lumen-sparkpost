<?php

use Nord\Lumen\SparkPost\SparkPostService;

/**
 * Class SparkPostTest.
 */
class SparkPostTest extends \Codeception\TestCase\Test
{
    use \Codeception\Specify;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * Tests with missing API key.
     * @expectedException        Exception
     * @expectedExceptionMessage You must provide an API key
     */    public function testServiceConfigNoApiKey()
    {
        new SparkPostService(['config' => 'invalid']);
    }

    /**
     * Tests with valid API key.
     */    public function testServiceConfigWithValidApiKey()
    {
        // Expects no exceptions
        $service = new SparkPostService(['client' => ['key' => 'testkey']]);
    }

}
