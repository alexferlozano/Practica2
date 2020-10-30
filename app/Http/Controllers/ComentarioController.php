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
    public function index(Request $request)
    {
        if($request->user()->tokenCan('user:coment'))
        {
            return comentario::all();
        }
        else
        {
            return abort(401,"Tienes 0 permiso de estar aqui");
        }
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
        if($request->user()->tokenCan('user:coment'))
        {
            $post=post::findorFail($id);
            $comentario=$post->comments()->create($request->all());
            return response()->json($comentario,200);
        }
        else
        {
            return abort(401,"Tienes 0 permiso de estar aqui");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(int $id, Request $request)
    {
        if($request->user()->tokenCan('user:coment'))
        {
            $post=post::findorFail($id);
            $comentario=DB::table('comentarios')->select('id','post_id','descripcion','autor')->where('post_id','=',$post->id)->get();
            return response()->json($comentario,200);
        }
        else
        {
            return abort(401,"Tienes 0 permiso de estar aqui");
        }
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
        if($request->user()->tokenCan('user:coment'))
        {
            $post=post::findorFail($id);
            $comentario=comentario::findorFail($id2);
            $comentario->post_id = $request->has('post_id') ? $request->get('post_id') : $comentario->post_id;
            $comentario->descripcion = $request->has('descripcion') ? $request->get('descripcion') : $comentario->descripcion;
            $comentario->autor = $request->has('autor') ? $request->get('autor') : $comentario->autor;
            $comentario->save();
            return response()->json($comentario,200);
        }
        else
        {
            return abort(401,"Tienes 0 permiso de estar aqui");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id,int $id2,Request $request)
    {
        if($request->user()->tokenCan('admi:delete'))
        {
            $post=post::findorFail($id);
            $comentario=comentario::findorFail($id2);
            $comentario->delete();
            return response()->json("El comentario $comentario->id ha sido eliminado",200);
        }
        else
        {
            return abort(401,"Tienes 0 permiso de estar aqui");
        }
    }
    public function buscar(int $id,Request $request)
    {
        if($request->user()->tokenCan('user:coment'))
        {
            $comentario = comentario::findorFail($id);
            return response()->json($comentario,200);
        }
        else
        {
            return abort(401,"Tienes 0 permiso de estar aqui");
        }
    }
}
