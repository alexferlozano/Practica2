<?php

namespace App\Http\Controllers;

use App\comentario;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = post::create($request->all());
        return response()->json($post,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $post=post::findorFail($id);
        $post->titulo = $request->has('titulo') ? $request->get('titulo') : $post->titulo;
        $post->descripcion = $request->has('descripcion') ? $request->get('descripcion') : $post->descripcion;
        $post->autor = $request->has('autor') ? $request->get('autor') : $post->autor;
        $post->save();

        return response()->json($post,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $post = post::findorFail($id);
        DB::table('comentarios')->where('post_id','=',$id)->delete();
        $post->delete();
        return response()->json($post,200);
    }
    public function buscar(int $id)
    {
        $post = post::findorFail($id);
        return response()->json($post,200);
    }
}
