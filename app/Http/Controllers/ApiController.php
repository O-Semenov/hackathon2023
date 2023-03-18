<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getInterlocutors(Request $request){
        $result = [];
        $user = Auth::user();
        $filterName = $request->input('name');
        $filterDepartment = $request->input('department');
        $chatsId = DB::table('chats_users')
            ->select('chat_id')
            ->where('user_id', '=', $user->id)
            ->pluck('chat_id');
        $chatUsersId = DB::table('chats_users')
            ->select('user_id')
            ->whereIn('chat_id', $chatsId)
            ->where('user_id', '<>', $user->id)
            ->pluck('user_id')
            ->toArray();
        $chatUsers = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('surname', 'users.name', 'patronymic', 'departments.name as dep', 'img',
                DB::raw('if (users.id IN (' . implode(',', $chatUsersId) . '), 1, 0) as flag')
            )
            ->orderByDesc('flag');
        if (isset($filterName)){
            $chatUsers
                ->Where('surname', 'LIKE', '%' . $filterName .'%')
                ->orWhere('users.name', 'LIKE', '%' . $filterName .'%')
                ->orWhere('patronymic', 'LIKE', '%' . $filterName .'%');
        }

        if (isset($filterDepartment)){
            $chatUsers
                ->Where('surname', 'LIKE', '%' . $filterName .'%');
        }
    return $chatUsers->get()->toArray();
    }
}
