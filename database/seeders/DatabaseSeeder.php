<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'super@admin.com';
        $user->password = bcrypt('password');
        $user->save();

        $role = Role::create(['name' => 'super admin']);
        $permission = Permission::create(['name' => 'create-admin']);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user->assignRole($role);
    }
}
