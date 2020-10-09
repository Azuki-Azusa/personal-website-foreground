<?php

namespace App\Http\Controllers;
use App\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messageboard()
    {
        return view('messageboard', ['messages' => array_reverse(Message::getMessages())]);
    }

    public function submitMessage(Request $request)
    {
        $name = $request->input('name');
        $content = $request->input('content');
        $ip = $request->ip();
        return Message::createMessage($name, $content, $ip);
    }
}
