<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercises';

    protected $fillable = ['title', 'description', 'video'];

    protected $attributes = ['video' => ''];

    public static function create($title, $description, $video = ''): self
    {
        $exercise = new self();
        $exercise->title = $title;
        $exercise->description = $description;
        $exercise->video = $video;

        return $exercise;
    }

    public function change($title, $description, $video)
    {
        $this->title = $title;
        $this->description = $description;

        if($video) {
            $this->video = $video;
        }
    }
}