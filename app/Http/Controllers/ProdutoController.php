<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::all();
        return response()->json(['data'=>$produto, 'status'=>true]);
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
        $dados = $request->all();
        $produto = Produto::Create($dados);

        if($produto){
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao cadastrar o produto', 'status'=>false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if($produto){
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else{
            return response()->json(['data'=>'O produto não existe', 'status'=>false]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
         $dados = $request->all();
        $produto = Produto::find($id);
        if($produto){
            $produto->update($dados);
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else{
            return response()->json(['data'=>'O produto não foi atualizado', 'status'=>false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if($produto){
            $produto->delete();
            return response()->json(['data'=>'Produto removido com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'O produto não foi removido!', 'status'=>false]);
        }
    }
}
