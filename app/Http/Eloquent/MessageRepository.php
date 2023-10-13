<?php


namespace App\Http\Eloquent;


use App\Events\sendMessage;
use App\Http\Interfaces\MessageRepositoryInterface;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class MessageRepository implements MessageRepositoryInterface
{
    public function index()
    {
        $users = User::select('id','name','user_type','photo')->get()->groupBy('user_type');
        return view('Hospital.pages.messageChat.index',compact('users'));
    }

    public function search($request)
    {
        return $chat = Message::with(['sender','receiver'])->where(['sender_id'=>Auth::user()->id,'receiver_id'=>$request->receiver_id])
            ->orWhere(['sender_id'=>$request->receiver_id,'receiver_id'=>Auth::user()->id])->get();
    }

    public function send($request)
    {

       $message = Message::create([
           'sender_id'=>Auth::user()->id,
           'receiver_id' => $request->receiver_id,
           'message' => $request->message
       ]);
        if (!$message)
        {
            return 'error';
        }
        event(new sendMessage($message));
        return $message;
    }
}
