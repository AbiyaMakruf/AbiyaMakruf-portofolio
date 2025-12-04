<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TestGcsUpload extends Command
{
    protected $signature = 'gcs:test-upload';

    protected $description = 'Upload a small probe file to GCS to verify credentials and bucket access';

    public function handle(): int
    {
        $disk = Storage::disk('gcs');

        $filename = 'debug/probe-' . now()->format('Ymd-His') . '-' . bin2hex(random_bytes(4)) . '.txt';
        $contents = "GCS probe at " . now()->toDateTimeString();

        try {
            $disk->put($filename, $contents);
            $url = $disk->url($filename);

            $this->info("Upload OK");
            $this->line("Path: {$filename}");
            $this->line("URL:  {$url}");
            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error("Upload failed: " . $e->getMessage());
            return self::FAILURE;
        }
    }
}
