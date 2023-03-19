<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
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

    public function userPageReadOnly(Request $request, $user_id){
        $user = User::where('id', $user_id)->first();

        $department = Department::where('id', $user->department_id)->first()->name;

        return view('profile', [
            'user_selected' => $user,
            'department' => $department
        ]);
    }
}
