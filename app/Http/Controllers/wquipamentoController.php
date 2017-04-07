<?php

namespace App\Http\Controllers;

use App\equipamento;
use App\loja;
use Illuminate\Http\Request;

class equipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipamentos = equipamento::orderBy('nome')->paginate(10);
        return view('equipamentos.index',compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   // o mesmo que ---->   $task = task::find($id);
        //return $equipamento;

        return view('equipamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   // o mesmo que ---->   $task = task::find($id);
        //return $equipamento;
        $this->validate(request(),[
                'codigo' => 'required|unique:equipamento',
                'nome' => 'required|unique:equipamento',
            ]);

        $equipamento=new equipamento;
        $equipamento->codigo=request()->codigo;
        $equipamento->nome=request()->nome;
        $equipamento->save();
        return redirect('/equipamentos');
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show(Task $equipamento){ // o mesmo que ---->   $task = task::find($id);
        //return $equipamento;
        return view('equipamentos.show',compact('equipamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function edit(equipamento $equipamento)
    {
        //
        //dd($equipamento->macAddress);
        $lojas=loja::orderBy('nome')->get();
        return view('equipamentos.edit',compact('equipamento','lojas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipamento $equipamento)
    {
        //

        $this->validate(request(),[
                'nome' => 'required',
            ]);


        if (equipamento::get()
                            ->where('id','<>',$equipamento->id)
                            ->where('nome',$request->nome)
                            ->where('loja_id',loja::get()->where('nome',request()->loja_id)->first()->id)->count()>0){
            return redirect()->back()->withErrors(['Teste']);
        }

        //dd($x);
        
        $equip=$equipamento;


        $equip->nome=request()->nome;
        $equip->loja()->associate(loja::get()->where('nome',request()->loja_id)->first()->id);
        $equip->save();
        return redirect('/equipamentos');
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipamento $equipamento)
    {
        //
    }
}
