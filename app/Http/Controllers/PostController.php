<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posty = Post::all();

        return view('post.lista', compact('posty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.dodaj');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
       // dd($request);
       $post = new Post();
       /* $post->tytul = request('tytul');
       $post->autor = request('autor');
       $post->email = request('email');
       $post->tresc = request('tresc');
       $post->save(); */
       $post->create($request->all());
       return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.pokaz', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edytuj', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
  /*       $post->tytul = request('tytul');
        $post->autor = request('autor');
        $post->email = request('email');
        $post->tresc = request('tresc'); */
//dd($post);
        $post->update($request->all());
       return redirect()->route('post.index')->with('message', "Pomyślnie zmieniono post");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->destroy($post->id);
        return redirect()->route('post.index')->with('message', "pomyślnie usunięto post")->with('class', 'danger');
    }
}
