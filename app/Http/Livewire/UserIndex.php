<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::all();
        $roles = Role::all();
        return view('livewire.user-index', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function userDelete($id) {
        permission_check('lead-management'); //this permission check not neccessary because livewire already verifed then send data. But we may use it for double data securities.
        $user = User::findOrFail($id);
        $user->delete();

        flash()->addSuccess('User Deleted Successfully!');
    }
}
