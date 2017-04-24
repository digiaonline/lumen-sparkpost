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
        new SparkPostService(['client' => ['key' => 'testkey']]);
    }

    /**
     * Tests send with unauthorised API key.
     * @expectedException \SparkPost\SparkPostException
     */
    public function testSendWithUnauthorisedKey()
    {
        // Expects no exceptions
        $sparkpost = new SparkPostService(['client' => ['key' => 'unauthorised', 'async' => false]]);

        $sparkpost->send([
            'from' => [
                'name' => 'From Envelope',
                'email' => 'from@sparkpostbox.com',
            ],
            'recipients' => [
                [
                    'address' => [
                        'email' => 'john.doe@example.com',
                    ],
                ],
            ],
            'template' => 'my-first-email',
        ]);
    }
}
