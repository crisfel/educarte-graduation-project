<?php

namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(CoordinatorSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(StudentSeeder::class);

    }
}
