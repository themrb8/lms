<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    public function render()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('livewire.role-index', [
            'roles' => $roles
        ]);
    }

    public function roleDelete($id) {
        permission_check('lead-management'); //this permission check not neccessary because livewire already verifed then send data. But we may use it for double data securities.
        $role = Role::findOrFail($id);
        $role->delete();

        flash()->addSuccess('Role Deleted Successfully!');
    }
}
