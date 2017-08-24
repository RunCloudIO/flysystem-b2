<?php

namespace RunCloudIO\FlysystemB2;

use ChrisWhite\B2\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use RunCloudIO\FlysystemB2\BackblazeAdapter;

class BackblazeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('b2', function ($app, $config) {
            if (!(
                isset($config['accountId']) ||
                isset($config['applicationKey']) ||
                isset($config['bucketName']))) {
                throw new \Exception('Please set all configuration keys. (accountId, applicationKey, bucketName)');
            }
            $client  = new Client($config['accountId'], $config['applicationKey']);
            $adapter = new BackblazeAdapter($client, $config['bucketName']);
            return new Filesystem($adapter);
        });
    }
    public function register()
    {
    }
}
