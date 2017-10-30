<?php

namespace App\Core\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $table = 'foods';

    //public $timestamps = false;

    //protected $dateFormat = 'U';
    /*protected function getDateFormat()
    {
        return 'U';
    }*/

    /*public function getUpdatedAtColumn()
    {
        return 'test';
    }*/

    public function getCreatedAtAttribute($value)
    {
        if(!empty($value)) {
            $value = Carbon::parse($value)->getTimestamp();
        }

        return $value;
    }

    /*protected $casts = [
        'createdAt' => 'integer',
    ];*/

    protected function serializeCreatedAt()
    {
        //return $date->getTimestamp();
        echo 'test';
    }

    public static function create($clientId, $day, $content): self
    {
        $food = new self();
        $food->clientId = $clientId;
        $food->day = $day;
        $food->content = $content;
        //$food->createdAt = Carbon::now();

        return $food;
    }

    public function change($content)
    {
        $this->content = $content;
        //$this->updatedAt = Carbon::now();
    }
}
