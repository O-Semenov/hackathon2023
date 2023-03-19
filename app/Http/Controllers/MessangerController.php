<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessangerController extends Controller
{

    public const PUBLIC_SIZE = 20;

    /*---------------------- Functions ----------------------*/

    public function createDialog($user_id){
        $chats_self = DB::table('chats_users')->where('user_id', Auth::user()->id)->get();

        foreach ($chats_self as $chat){
            if ($user_id != Auth::user()->id){
                $chats_self_i = DB::table('chats_users')->where([
                    ['chat_id', '=', $chat->chat_id],
                    ['user_id', '<>', Auth::user()->id]
                ])->get();
            }else{
                $chats_self_i = DB::table('chats_users')->where([
                    ['chat_id', '=', $chat->chat_id],
                    ['user_id', '=', Auth::user()->id]
                ])->get();
            }


            foreach ($chats_self_i as $chat_i){
                if ($chat_i->user_id == $user_id){
                    return $chat_i->chat_id;
                }
            }
        }

        // Создание чата
        $new_chat_id = DB::table('chats')->insertGetId([
            'name' => '',
            'type' => 0
        ]);

        DB::table('chats_users')->insert([
            ['chat_id' => $new_chat_id, 'user_id' => Auth::user()->id],
            ['chat_id' => $new_chat_id, 'user_id' => $user_id],
        ]);

        return $new_chat_id;
    }

    public function getUsers(){
        return User::where([
            ['id', '<>', Auth::user()->id]
        ])->get();
    }

    public function sendMessage(Request $request, $chat_id){

        $params = $request->all();

        $message = '';
        if ($params['message']){
            $message = $params['message'];
        }


        $message_id = DB::table('messages')->insertGetId(
            ['chat_id' => $chat_id, 'user_id' => Auth::user()->id, 'message' => $message],
        );

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = "files/".$filename."_".time().".".$extention;
            $path = mb_substr(
                $request->file('file')->storeAs('public', $fileNameToStore),
                self::PUBLIC_SIZE
            );

            $expod = explode('.', $fileNameToStore);
            $type = end($expod);

            $type_db = 0;
            if ($type == 'jpg' || $type == 'png' || $type == 'bmp'){
                $type_db = 1;
            }

            DB::table('files')->insert([
                [
                    'uri' => $fileNameToStore,
                    'type' => $type_db,
                    'message_id' => $message_id,
                    'chat_id' => $chat_id
                ]
            ]);
        }

        return redirect(url()->previous());
        return 'send message: ' . $chat_id . ' - ' . $validateFields['message'];
    }

    public function getNewChatMessages($chat_id){
        if (!Auth::check()){
            return redirect(route('login'));
        }

        $lastTime = DB::table('chats_users')->where([
            ['chat_id', '=', $chat_id],
            ['user_id', '=', Auth::user()->id]
        ])->first()->last_time;

        $newMessages = DB::table('messages')
            ->leftJoin('files', 'messages.id', '=', 'files.message_id')
            ->where([
                ['messages.chat_id', '=', $chat_id],
                ['date', '>', $lastTime]
            ])
            ->orderBy('messages.id', 'asc')
            ->get();

        if ($newMessages->count() > 0){
            $lastTime = $newMessages[$newMessages->count() - 1]->date;

            DB::table('chats_users')->where([
                ['chat_id', '=', $chat_id],
                ['user_id', '=', Auth::user()->id]
            ])->update([
                'last_time' => $lastTime
            ]);
        }

        return $newMessages->toJson();
    }


    /*---------------------- View ----------------------*/

    public function index(Request $request){
        if (!Auth::check()){
            return redirect(route('login'));
        }

        return view('messanger/messanger', [
            'users' => $this->getUsers(),
            'chat' => false
        ]);
    }


    public function userCreateChat(Request $request, $user_id){
        $chat_id = $this->createDialog($user_id);
        return redirect('/messanger/chat/' . $chat_id);
    }

    public function userChat(Request $request, $chat_id){

        $messages = DB::table('messages')
            ->leftJoin('files', 'messages.id', '=', 'files.message_id')
            ->where('messages.chat_id', $chat_id)
            ->orderBy('messages.id', 'asc')
            ->get();

        $user_id = DB::table('chats_users')->where([
            ['chat_id', '=', $chat_id],
            ['user_id', '<>', Auth::user()->id]
        ])->first()->user_id;
        $user_selected = User::where('id', $user_id)->first();


        return view('messanger/messanger', [
            'users' => User::where('id', '<>', Auth::user()->id)->get(),
            'chat' => true,
            'chat_id' => $chat_id,
            'user_selected' => $user_selected,
            'messages' => $messages
        ]);
    }
}
