<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;

function permission_check($permission) {
    if(!Auth::user()->hasPermissionTo($permission)) {
        flash()->addWarning('You are not authorized to access this page.');
        return redirect()->back();
    }
}