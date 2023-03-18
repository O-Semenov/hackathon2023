<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userPage(Request $request){
        if (!Auth::check()){
            return redirect(route('login'));
        }

        $user = Auth::user();
        $department = Department::find($user->department_id);

        return view('index', ['department' => $department]);
    }
}
