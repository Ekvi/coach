<?php

use App\Core\Models\User;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //echo 'coach';
        factory(User::class, 'coaches', 5)->create();
    }
}
