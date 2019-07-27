<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Industria;

use App\Produto;

class IndustriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industria = Industria::all();
        return response()->json(['data'=>$industria, 'status'=>true]);
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
        $industria = Industria::Create($dados);

        if($industria){
            return response()->json(['data'=>$industria, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao cadastrar a industria', 'status'=>false]);
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
        $industria = Industria::find($id);
        if($industria){
            $produtos = Produto::where('id_industria', '=', $id)->get();
            return response()->json(['data'=>$produtos, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Não existe produtos desta Industria', 'status'=>false]);
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
        $industria = Industria::find($id);
        if($industria){
            $industria->update($dados);
            return response()->json(['data'=>$industria, 'status'=>true]);
        }else{
            return response()->json(['data'=>'A industria não foi atualizado', 'status'=>false]);
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
        $industria = Industria::find($id);
        if($industria){
            $industria->delete();
            return response()->json(['data'=>'Industria removida com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'A industria não foi removida!', 'status'=>false]);
        }
    }
}
