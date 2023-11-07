<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name'=>'Administrator']);
        $roleCoord = Role::create(['name'=>'Coordinator']);
        $roleTeacher = Role::create(['name'=>'Teacher']);
        $roleStudent = Role::create(['name'=>'Student']);
        Permission::create(['name'=>'createSchool'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'seeSchools'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'editSchools'])->assignRole($roleAdmin);
        Permission::create(['name'=>'createCoordinator'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'seeCoordinators'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'editCoordinators'])->assignRole($roleAdmin);
        Permission::create(['name'=>'createCategory'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'seeCategory'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'editCategory'])->assignRole($roleAdmin);
        Permission::create(['name'=>'createSubcategory'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'seeSubcategory'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'editSubcategory'])->assignRole($roleAdmin);

        //Permissions of coordinators
        Permission::create(['name'=>'createTeachers'])->assignRole($roleCoord);
        Permission::create(['name'=> 'seeTeachers'])->assignRole($roleCoord);
        Permission::create(['name'=> 'editTeachers'])->assignRole($roleCoord);
        Permission::create(['name'=>'createStudents'])->assignRole($roleCoord);
        $see_students = Permission::create(['name'=> 'seeStudents'])->assignRole($roleCoord);
        Permission::create(['name'=> 'editStudents'])->assignRole($roleCoord);
        Permission::create(['name'=>'createClassrooms'])->assignRole($roleCoord);
        $see_classrooms = Permission::create(['name'=> 'seeClassrooms'])->assignRole($roleCoord);
        Permission::create(['name'=> 'editClassrooms'])->assignRole($roleCoord);

        //Permissions of teachers
        $roleTeacher->givePermissionTo($see_classrooms);
        $roleTeacher->givePermissionTo($see_students);
        Permission::create(['name'=> 'seeHomeworks'])->assignRole($roleTeacher);
        Permission::create(['name'=> 'editHomeworks'])->assignRole($roleTeacher);
        Permission::create(['name'=> 'createHomeworks'])->assignRole($roleTeacher);
    }
}
