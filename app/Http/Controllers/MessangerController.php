<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessangerController extends Controller
{
    public function index(Request $request){
        if (!Auth::check()){
            return redirect(route('login'));
        }

        $users = User::all();

        return view('messanger/messanger', [
            'users' => $users
        ]);
    }


    public function userChat(Request $request, $user_id){
        //dd($user_id);

        $departments = DB::table('chats')->where([
            []
        ])->get();
        dd($departments);
    }
}
