<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false;

    static public function getBlogList() {
        return array_reverse(Blog::select('id', 'title', 'views', 'datetime')->get()->all());
    }

    static public function viewBlog($blog_id) {
        $blog = Blog::findOrFail($blog_id);
        $blog->views ++;
        $blog->save();
    }

    static public function getBlogByID($blog_id) {
        return Blog::findOrFail($blog_id);
    }
}
