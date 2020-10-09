<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public $timestamps = false;

    static public function getCommentsByBlogID($blog_id)
    {
        return BlogComment::where('blog_id', $blog_id)->select('id', 'content', 'datetime', 'author_name')->get()->all();
    }

    static public function createComment($blog_id, $name, $content, $ip)
    {
        if (!$blog_id || !$name || !$content)
        {
            return response('评论或称呼不能为空', 400);
        }
        $comment = new BlogComment;

        $comment->blog_id = $blog_id;
        $comment->content = $content;
        $comment->author_name = $name;
        date_default_timezone_set('Asia/Shanghai');
        $comment->datetime = date("Y-m-d H:i:s");
        $comment->ip = $ip;

        $comment->save();

        return response('评论成功', 200);
    }
}
