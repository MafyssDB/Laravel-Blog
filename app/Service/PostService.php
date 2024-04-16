<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        $data['image'] = Storage::disk('public')->put('/images',$data['image'] );
        Post::firstOrCreate($data);
    }

    public function update($data, $post)
    {
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        $post->update($data);

        return $post;
    }
}
