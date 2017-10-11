<?php

namespace App\Core\Services\Upload;

use Illuminate\Http\UploadedFile;

interface Uploader
{
    public function upload(UploadedFile $file);
}