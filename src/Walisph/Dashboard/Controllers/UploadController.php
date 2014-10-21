<?php namespace Walisph\Dashboard\Controllers;

use Walisph\Dashboard\Traits\UploadTrait;
use Illuminate\Filesystem\Filesystem;

class UploadController extends DashboardController {

    use UploadTrait;

    protected function createDirectory( $folder )
    {
        if( ! $this->dash->file->exists( public_path( $this->dash->config('walis-dashboard::upload.local') . $folder )) )
        {
            return $this->dash->file->makeDirectory( public_path( $this->dash->config('walis-dashboard::upload.local') . $folder ), 0777, true );
        }
        return true;
    }

    protected function compilingImage( $file, $directory )
    {
        $image = [];
        $quality = [
            'jpg' => $this->dash->config('walis-dashboard::upload.quality.jpg'),
            'image' => $this->dash->config('walis-dashboard::upload.quality.image')
        ];
        $local_save_dir = public_path( $this->dash->config('walis-dashboard::upload.local') . $directory );

    }
}
 