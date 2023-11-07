<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@admin.com';
        $user->phone = '32423423';
        $user->role = 'Administrator';
        $user->is_enable = 1;
        $user->password = bcrypt('admin');
        $user->save();
        $user->assignRole('Administrator');
    }
}
