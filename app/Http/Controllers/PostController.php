<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::wherePublished(true)->latest()->get();

        return PostResource::collection(
            $posts
        );
    }
}
