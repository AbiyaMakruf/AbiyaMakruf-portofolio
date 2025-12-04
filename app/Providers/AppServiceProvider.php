<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Filesystem\FilesystemAdapter;
use League\Flysystem\Filesystem;
use Google\Cloud\Storage\StorageClient;
use League\Flysystem\GoogleCloudStorage\GoogleCloudStorageAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS for generated URLs when running behind a proxy (e.g., Cloud Run)
        if (config('app.env') === 'production' || env('FORCE_HTTPS')) {
            URL::forceScheme('https');
        }

        Storage::extend('gcs', function ($app, $config) {
            $storageClient = new StorageClient([
                'projectId' => $config['project_id'],
                'keyFile' => $config['key_file'],
            ]);

            $bucket = $storageClient->bucket($config['bucket']);
            $adapter = new GoogleCloudStorageAdapter($bucket);
            $filesystem = new Filesystem($adapter);

            return new class($filesystem, $adapter, $config, $bucket) extends FilesystemAdapter {
                protected $bucket;

                public function __construct($driver, $adapter, $config, $bucket)
                {
                    parent::__construct($driver, $adapter, $config);
                    $this->bucket = $bucket;
                }

                public function url($path)
                {
                    return $this->config['url'] . '/' . ltrim($path, '/');
                }

                public function temporaryUrl($path, $expiration, array $options = [])
                {
                    return $this->bucket->object($path)->signedUrl($expiration, $options);
                }
            };
        });
    }
}
