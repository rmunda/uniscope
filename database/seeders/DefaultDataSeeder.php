<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        // Create first admin user
        $admin = User::firstOrCreate(['email' => 'rmunda@uniscope.test'], [
            'name'     => 'Ram Munda',
            'password' => bcrypt('password'),
            'active'   => true,
        ]);
        $admin->assignRole('admin');
    }
}
