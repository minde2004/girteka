<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    public function show()
    {
        return view('admin.dashboard', ['users' => User::count()]);
    }
}
