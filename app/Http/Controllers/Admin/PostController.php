<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
     protected $postValidationRules = [
        'title' => 'required|min:2|max:255',
        'post_image' => 'required|url',
        'post_content' => 'required|min:5|max:255',
        'date' => 'required|date|after:2022/01/01',
     ];
    //custom error messages
    protected $postValidationMsgs = [
        'title.required' => 'Inserisci un titolo',
        'title.min' => 'Il titolo deve avere almeno 3 caratteri',
        'post_image.url' => "Inserisci un link valido",
        'post_image.required' => "Inserisci un link",
        'post_date.after' => 'Inserisci una data valida',
        'post_content.required' => 'La descrizione deve essere inserita',
        'post_content.min' => 'La descrizione deve avere almeno 5 caratteri',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();
        return view ('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('admin.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->postValidationRules);

        $post = new Post();
        $post->create($data);
        $post->date = date("Y/m/d H:i:s");
        $post->save();

        return redirect()->route('admin.posts.index')->with("created", "Il Post" . $post->title . " è stato creato.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        //dd('hello');
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate($this->postValidationRules);

        $post = Post::findOrFail($id);
        $post->update($data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with("deleted", "Il Post" . $post->title . "è stato cancellato.");;
    }
}
