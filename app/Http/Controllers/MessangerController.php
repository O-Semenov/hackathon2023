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

        $chats = DB::table('chats_users')->where('user_id', Auth::user()->id)->get();

        foreach ($chats as $chat){
            $user = DB::table('chats_users')->where([
                ['chat_id', '=', $chat->id],
                ['user_id', '<>', Auth::user()->id]
            ])->first();
            echo $user->user_id;
        }
        die();

        dd($chats);


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
