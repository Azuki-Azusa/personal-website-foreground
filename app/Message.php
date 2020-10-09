<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    static public function getMessages()
    {
        return Message::select('id', 'content', 'datetime', 'author_name')->get()->all();
    }

    static public function createMessage($name, $content, $ip)
    {
        if (!$name || !$content)
        {
            return response('评论或称呼不能为空', 400);
        }

        $message = new Message;

        $message->content = $content;
        $message->author_name = $name;
        date_default_timezone_set('Asia/Shanghai');
        $message->datetime = date("Y-m-d H:i:s");
        $message->ip = $ip;

        $message->save();

        return response('留言成功', 200);
    }
}
