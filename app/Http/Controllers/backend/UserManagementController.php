<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function roleIndex()
    {
        return view('backend.user-management.role.index');
    }
}
