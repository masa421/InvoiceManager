<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'Hiro',
            'email' => 'accounts@dflat.com.au',
            'password' => bcrypt('U6Zax3_Mm+LN!sCH')
        ]);
        $user2 = User::factory()->create([
            'name' => 'Masa',
            'email' => 'masa.naoh421@gmail.com',
            'password' => bcrypt('rfiw3nMZ9FuJDKz')
        ]);

        Company::factory(1)->create([
            'user_id' => $user1->id
        ]);

        Company::factory(1)->create([
            'user_id' => $user2->id
        ]);



    }
}
