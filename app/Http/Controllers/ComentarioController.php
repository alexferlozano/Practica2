<?php

namespace App\Http\Controllers;

use App\comentario;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return comentario::all();
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
    public function store(Request $request,int $id)
    {
        $post=post::findorFail($id);
        DB::table('comentarios')->insertOrIgnore([
            'post_id' => $post->id, 'descripcion' => $request->all()
        ]);
        return $comentario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post=post::findorFail($id);
        $comentario=DB::table('comentarios')->select('id','post_id','descripcion','autor')->where('post_id','=',$post->id)->get();
        //$comentario=comentario::all()->where("post_id",$post->id);
        return $comentario;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id,int $id2)
    {
        $post=post::findorFail($id);
        $comentario=comentario::findorFail($id2);
        $comentario->post_id = $request->has('post_id') ? $request->get('post_id') : $comentario->post_id;
        $comentario->descripcion = $request->has('descripcion') ? $request->get('descripcion') : $comentario->descripcion;
        $comentario->autor = $request->has('autor') ? $request->get('autor') : $comentario->autor;
        $comentario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id,int $id2)
    {
        $post=post::findorFail($id);
        $comentario=comentario::findorFail($id2);
        $comentario->delete();
        return $comentario;
    }
}
