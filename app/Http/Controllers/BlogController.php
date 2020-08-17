<?php

namespace App\Http\Controllers;
use App\Blog;
use App\BlogComment;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogList()
    {
        // return Blog::allBlogs();
        return view('bloglist', ['blogs' => Blog::getBlogList()]);
    }

    public function blog($blog_id)
    {
        Blog::viewBlog($blog_id);
        // return ['blog' => Blog::getBlogByID($blog_id), 'comments' => BlogComment::getCommentsByBlogID($blog_id)];
        return view('blog', ['blog' => Blog::getBlogByID($blog_id), 'comments' => BlogComment::getCommentsByBlogID($blog_id)]);
    }

    public function submitComment(Request $request)
    {
        $name = $request->input('name');
        $comment = $request->input('comment');
        $blog_id = $request->input('blog_id');
        return BlogComment::createComment($blog_id, $name, $comment);
    }
}
