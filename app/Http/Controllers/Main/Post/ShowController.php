<?php

namespace App\Http\Controllers\Main\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $relatedPosts = Post::where('category_id', $post->category->id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(4);
        return view('main.post.show', compact('post','relatedPosts'));
    }
}
