<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $post = Post::find(2);
        $category = Category::find(1);
        dd($category->posts[1]->title);
        //dd($post->category->title);


        // $post = Post::find(3);
        // $post->delete();
        
        // $post->update(

        //     [
        //         'title' => 'My First Post Updated',
        //         'slug' => 'Test slug',
        //         'content' => 'Test content',
        //         'category_id' => 1,
        //         'description' => 'Test description',
        //         'posted' => 'not',
        //         'image' => 'Test image',
        //     ]
        // );
        // dd($post->title);
        // Post::create(

        //     [
        //         'title' => 'My First Post',
        //         'slug' => 'Test slug',
        //         'content' => 'Test content',
        //         'category_id' => 1,
        //         'description' => 'Test description',
        //         'posted' => 'not',
        //         'image' => 'Test image',
        //     ]
        // );
        // return 'Index';
        return 'Index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
