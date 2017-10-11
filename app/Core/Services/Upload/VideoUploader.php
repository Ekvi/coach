<?php

namespace App\Core\Services\Upload;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class VideoUploader implements Uploader
{
    public function upload(UploadedFile $file)
    {
        $path = $this->buildPath();

        $savedFilename = Storage::disk('uploads')->put($path, $file, 'public');

        return $savedFilename;
    }

    private function buildPath()
    {
        $time = time();
        $year = date('Y', $time);
        $month = date('m', $time);
        $day = date('d', $time);

        //$filename = $time . '.' . $file->getClientOriginalExtension();

        return 'video/' . $year . '/' . $month . '/' . $day;
    }

    public function delete($path)
    {
        Storage::disk('uploads')->delete($path);
    }
}