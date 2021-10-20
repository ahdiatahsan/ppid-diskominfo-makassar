<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Administrator";
        $user->email = "diskominfo@mail.com";
        $user->password = bcrypt('diskominfo1234');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
    }
}
