<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= Post::paginate(2);
        //dd($posts);


        //$post = Post::find(2);
        //$category = Category::find(1);
        //dd($category->posts[1]->title);
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
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        //dd($categories);



        return view('dashboard.post.create',compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        Post::create($request->validated());
        return to_route('post.index');



        // $validator = Validator::make($request->all(),
        //     [
        //         'title' => 'required|min:5|max:500',
        //         'slug' => 'required|min:5|max:500',
        //         'content' => 'required|min:7',
        //         'category_id' => 'required|integer',
        //         'description' => 'required|min:7',
        //         'posted' => 'required',
        //     ]
        //     );
            //dd($validator->fails());
        
        //dd($request->all());
        // $request->validate([
        //     'title' => 'required|min:5|max:500',
        //     'slug' => 'required|min:5|max:500',
        //     'content' => 'required|min:7',
        //     'category_id' => 'required|integer',
        //     'description' => 'required|min:7',
        //     'posted' => 'required',
        //     // 'image' => 'nullable|image|max:2048', // Uncomment if you want to handle image uploads
        // ]);
        

        

        // Post::create(
        // [
            // 'title' => $request->all()['title'],
            // 'slug' => $request->all()['slug'],
            // 'content' => $request->all()['content'],
            // 'category_id' => $request->all()['category_id'],
            // 'description' => $request->all()['description'],
            // 'posted' => $request->all()['posted'],
            // //'image' => $request->all()['image'],
        // ]
//  );

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard/post/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        //dd($post);  
        return view('dashboard.post.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        //dd($request->image);
        //dd(public_path('upload/posts'));
        if(isset($data['image'])){
            $data['image'] = $filename= time().'.'.$data['image']->extension();
            $request->image->move(public_path('upload/posts'), $filename);
        }

        

        $post->update($data);
        //dd($post);
        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index');
    }
}
