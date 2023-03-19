<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public const PUBLIC_SIZE = 20;

    public function adminPage(Request $request){
        if (Auth::user()->role != 0){
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

        if (Auth::user()->role >= $user->role && Auth::user()->id != $user->id){
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

        if (Auth::user()->role > $user->role){
            return redirect(route('bad_role'));
        }

        $params = $request->all();

        $path = null;
        if($params['image']){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "avatars/".$filename."_".time().".".$extention;
            $path = mb_substr(
                $request->file('image')->storeAs('public', $fileNameToStore),
                self::PUBLIC_SIZE
            );

            $user->update([
                'img' => $fileNameToStore
            ]);
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
