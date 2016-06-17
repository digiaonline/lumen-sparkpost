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
     * @var \Nord\Lumen\Fractal\SparkPostService
     */
    protected $service;

    /**
     * Tests the with missing API key.
     * @expectedException        Exception
     * @expectedExceptionMessage You must provide an API key
     */    public function testServiceConfigNoApiKey()
    {
    new SparkPostService(['config' => 'invalid']);
    }
}
