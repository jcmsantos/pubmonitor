<?php

namespace App\Http\Controllers;

use App\loja;
use App\equipamento;
use Illuminate\Http\Request;

class LojasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $lojas = loja::orderby('nome')->paginate(5);


    foreach ($lojas as $loja) {
        $loja->equip=equipamento::where('loja_id',$loja->id)->orderBy('nome')->get();
    }
    return view('lojas.index',compact('lojas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){ // o mesmo que ---->   $task = task::find($id);
    //return $lojas;

    return view('lojas.create');
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){ // o mesmo que ---->   $task = task::find($id);
    //return $lojas;
        $this->validate(request(),[
                'codigo' => 'required|unique:lojas',
                'nome' => 'required|unique:lojas',
            ]);


        $lojas=new Loja;
        $lojas->codigo=request()->codigo;
        $lojas->nome=request()->nome;
        $lojas->save();
        return redirect('/lojas');

    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Lojas  $lojas
     * @return \Illuminate\Http\Response
     */
    public function show(Task $loja){ // o mesmo que ---->   $task = task::find($id);
    //return $lojas;
    return view('lojas.show',compact('loja'));
    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lojas  $lojas
     * @return \Illuminate\Http\Response
     */
    public function edit(Lojas $lojas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lojas  $lojas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lojas $lojas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lojas  $lojas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lojas $lojas)
    {
        //
    }
}
