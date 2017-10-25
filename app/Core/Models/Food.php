<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    public $timestamps = false;

    public static function create($clientId, $day, $content): self
    {
        $food = new self();
        $food->clientId = $clientId;
        $food->day = $day;
        $food->content = $content;

        return $food;
    }

    public function change($content)
    {
        $this->content = $content;
    }
}
