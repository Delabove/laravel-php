<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public static function find($slug)
    {


        base_path();
        if (!file_exists($path = resource_path("/posts/$slug.html"))) {

            throw ModelNotFoundException();
        }

        return cache()->remember("posts.$slug", 1200, function () use ($path) {


            return file_get_contents($path);
        });

//    return view('post', [
//        'post' => $post]);
//
//}
    }
}
