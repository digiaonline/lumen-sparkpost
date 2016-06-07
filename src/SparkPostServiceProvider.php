<?php

namespace Nord\Lumen\SparkPost;

use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use Nord\Lumen\SparkPost\Contracts\SparkPostServiceContract;

/**
 * Class SparkPostServiceProvider.
 *
 * @package Nord\Lumen\SparkPost
 */
class SparkPostServiceProvider extends ServiceProvider
{
    const CONFIG_KEY = 'sparkpost';

    /**
     * @inheritdoc
     */
    public function register()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $this->app->configure(self::CONFIG_KEY);

        $this->registerBindings($this->app, $this->app['config']);
    }

    /**
     * @param Container        $container
     * @param ConfigRepository $config
     */
    protected function registerBindings(Container $container, ConfigRepository $config)
    {
        $container->singleton(SparkPostService::class, function () use ($config) {
            $sparkpost = new SparkPostService();
            /** @noinspection PhpUndefinedMethodInspection */
            $this->configureService($sparkpost, $config[self::CONFIG_KEY]);

            return $sparkpost;
        });

        $container->alias(SparkPostService::class, SparkPostServiceContract::class);
    }
}
