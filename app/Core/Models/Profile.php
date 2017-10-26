<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    public $timestamps = false;

    public static function createDefault($clientId): self
    {
        $profile = new self();

        $profile ->clientId = $clientId;
        $profile ->name = "";
        $profile ->age = 0;
        $profile ->gender = "man";
        $profile ->height = 0;
        $profile ->weight = 0;
        $profile ->goal = "";
        $profile ->place = "home";
        $profile ->experience = false;
        $profile ->days = 1;
        $profile ->trauma = "";
        $profile ->medicalConstraints = "";
        $profile ->food = "";
        $profile ->allergy = "";

        return $profile ;
    }
}