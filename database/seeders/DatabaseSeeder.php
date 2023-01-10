<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Lead;
use App\Models\Course;
use App\Models\Curriculum;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $defaultPermissions = ['lead-management','create-admin', 'user-management'];
        foreach($defaultPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        //create user with roles
        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');
        $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');

        //create leads from leadfactory
        Lead::factory()->count(100)->create();

        //create course
        $course = Course::create([
            'name' => 'Laravel',
            'description' => 'Laravel is a PHP web application framework with expressive, elegant syntax. We have already laid the foundation — freeing you to create without sweating the...',
            'image' => 'https://laravel.com/img/logomark.min.svg',
            'user_id' => $teacher->id,
            'price' => 500,
            'time' => '09:15:00',
            'end_date' => '2023-01-08',

        ]);


        //create courses curriculums
        Curriculum::factory()->count(5)->create();
    }

    //create role assigned to permission
    private function create_user_with_role ($type, $name, $email) {
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);

        if($type == 'Super Admin'){
            $role->givePermissionTo(Permission::all());
        }elseif($type == 'Leads') {
            $role->givePermissionTo('lead-management');
        }

        $user->assignRole($role);

        return $user;
    }
}
