<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminPage(Request $request){
        if (Auth::user()->role != 0 && Auth::user()->role != 1){
            return redirect(route('index'));
        }

        $departments = Department::all();

        return view('admin', [
            'departments' => $departments
        ]);
    }

    public function userEdit($user_id){
        if (Auth::user()->role != 0 && Auth::user()->role != 1){
            return redirect(route('index'));
        }

        $user = User::where('id', $user_id)->first();

        if (Auth::user()->role > $user->role){
            return redirect(route('bad_role'));
        }

        $departments = Department::all();

        return view('admin/user_edit', [
            'user' => $user,
            'departments' => $departments
        ]);
    }

    public function userEditSave(Request $request, $user_id){
        if (Auth::user()->role != 0 && Auth::user()->role != 1){
            return redirect(route('index'));
        }

        $user = User::where('id', '=', $user_id)->first();

        $params = $request->all();


        /*
        $validateFields = $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'patronymic' => 'required',
            'email' => 'required|email',
            'department_id' => 'required',
            'role' => 'required',
            //'img' => 'required',
        ]);
        */




        if (Auth::user()->role > $user->role){
            return redirect(route('bad_role'));
        }


        $user->update([
            'surname' => $params['surname'],
            'name' => $params['name'],
            'patronymic' => $params['patronymic'],
            'email' => $params['email'],
            'department_id' => $params['department_id'],
            'role' => $params['role'],
        ]);

        return redirect(route('good_user_edit'));
    }
}
