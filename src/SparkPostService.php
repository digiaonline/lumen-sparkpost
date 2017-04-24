<?php

namespace Nord\Lumen\SparkPost;

use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Nord\Lumen\SparkPost\Contracts\SparkPostServiceContract;
use SparkPost\SparkPost;

/**
 * Class SparkPostService.
 *
 * @package Nord\Lumen\SparkPost
 */
class SparkPostService implements SparkPostServiceContract
{
    /**
     * @var SparkPost
     */
    private $client;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $clientConfig = isset($config['client']) ? $config['client'] : [];
        $this->client = new SparkPost(new GuzzleAdapter(new Client()), $clientConfig);
    }

    /**
     * @inheritdoc
     */
    public function send(array $config)
    {
        return $this->client->transmissions->post($config);
    }
}
