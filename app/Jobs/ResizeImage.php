<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $w;
    private $h;
    private $filename;
    private $path;
    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $w ,$h)
    {
        $this->path=dirname($filePath);
        $this->filename=basename($filePath);
        $this->w=$w;
        $this->h=$h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w=$this->w;
        $h=$this->h;
        $srcPath=storage_path().'/app/public/'. $this->path . '/'. $this->filename;
        $destPath=storage_path().'/app/public/'. $this->path . "/crop_{$w}x{$h}_" . $this->filename;

        $croppedImage= Image::load($srcPath)
                    ->crop(Manipulations::CROP_CENTER, $w,$h)
                    ->watermark(base_path('resources/media/watermark/codeartisans.png'))
                    ->watermarkWidth(250, Manipulations::UNIT_PIXELS)
                    ->watermarkHeight(200, Manipulations::UNIT_PIXELS)


                    ->save($destPath);
    }

}
