<?php

use App\Core\Models\Profile;
use App\Core\Models\User;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(User::class, 'clients', 3)->create();
        factory(User::class, 'clients', 3)->create()->each(
            function($client) {
                factory(Profile::class)->create(['clientId' => $client->id]);
            }
        );
    }
}
