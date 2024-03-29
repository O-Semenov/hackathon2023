<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public const PUBLIC_SIZE = 20;

    public function login(Request $request){
        $formField = $request->only(['email', 'password']);

        if (Auth::attempt($formField)){
            return redirect()->to(route('index'));
        }else{
            return redirect()->to(route('login-error'));
        }
    }

    public function register(Request $request){
        if (!Auth::check()){
            return redirect(route('login'));
        }
        if (Auth::user()->role != 0 && Auth::user()->role != 1){
            return redirect(route('index'));
        }
        $path = null;
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "avatars/".$filename."_".time().".".$extention;
            $path = mb_substr(
                $request->file('image')->storeAs('public', $fileNameToStore),
                self::PUBLIC_SIZE
            );
        }

        $validateFields = $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'patronymic' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'department_id' => 'required'
        ]);
        $validateFields['img'] = $path;

        // Корректность отдела
        $departmentCheck = Department::where('id', $validateFields['department_id'])->first();
        if ($departmentCheck == null){
            return redirect(route('registration_bad_department'));
        }

        // Проверка Email
        $userChech = User::where('email', $validateFields['email'])->first();
        if ($userChech != null){
            return redirect(route('registration_has_user'));
        }

        // Создание пользователя в базе
        $user = User::create($validateFields);

        if ($user){
            return redirect(route('good_registration'));
        }

        return 'Error';
    }
}
