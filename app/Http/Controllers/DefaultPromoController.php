<?php

namespace App\Http\Controllers;

use App\defaultpromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class defaultpromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $defaultpromos = defaultpromo::orderbyraw('upper(nome)')->paginate(5);
        return view('defaultpromo.index',compact('defaultpromos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('defaultpromo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),[
                'nome' => 'required|unique:defaultpromos',
            ]);

        if (!request()->hasfile('imagem')){
            return redirect()->back()->withErrors(['imagem obrigatoria']);
        }

        $img=request()->file('imagem');
        $lojas=new defaultpromo;
        $lojas->nome=request()->nome;
        $lojas->dom=request()->dom;
        $lojas->seg=request()->seg;
        $lojas->ter=request()->ter;
        $lojas->qua=request()->qua;
        $lojas->qui=request()->qui;
        $lojas->sex=request()->sex;
        $lojas->sab=request()->sab;
        $lojas->inicio=request()->inicio;
        $lojas->fim=request()->fim;
        $lojas->save();

        //grava a imagem como ID da ultima pomo
        $img->move(public_path().'/promo/img/',$lojas->id.'.'.$img->getClientOriginalExtension());

        //grava o nome d aimagem io MD5 da imagem
        $lojas->caminho=$lojas->id.'.'.$img->getClientOriginalExtension();
        $lojas->md5=md5_file(public_path().'/promo/img/'.$lojas->id.'.'.$img->getClientOriginalExtension());
        $lojas->save();

        //grava o thumbnail da imagem
        $tmb = Image::make(public_path().'/promo/img/'.$lojas->id.'.'.$img->getClientOriginalExtension());
        $tmb->resize(null, 90, function ($constraint) {
                                $constraint->aspectRatio();
                            });
        $tmb->save(public_path().'/promo/mini/'.$lojas->id.'.'.$img->getClientOriginalExtension());
        return redirect('/defaultpromo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\defaultpromo  $defaultpromo
     * @return \Illuminate\Http\Response
     */
    public function show(defaultpromo $defaultpromo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\defaultpromo  $defaultpromo
     * @return \Illuminate\Http\Response
     */
    public function edit(defaultpromo $defaultpromo)
    {
        return view('defaultpromo.edit',compact('defaultpromo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\defaultpromo  $defaultpromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, defaultpromo $defaultpromo)
    {
        
        if($defaultpromo->id<>1){

            if(defaultpromo::get()
                            ->where('id','<>',$defaultpromo->id)
                            ->where('nome',$request->nome)
                            ->count()>0){
            return redirect()->back()->withErrors(['Nome já existe']);
            };
        };

        if (request()->hasfile('imagem')){

            $img=request()->file('imagem');
            //grava a imagem como ID da ultima pomo
            $img->move(public_path().'/promo/img/',$defaultpromo->id.'.'.$img->getClientOriginalExtension());

            //grava o nome d aimagem io MD5 da imagem
            $defaultpromo->caminho=$defaultpromo->id.'.'.$img->getClientOriginalExtension();
            $defaultpromo->md5=md5_file(public_path().'/promo/img/'.$defaultpromo->id.'.'.$img->getClientOriginalExtension());
            $defaultpromo->save();

            //grava o thumbnail da imagem
            $tmb = Image::make(public_path().'/promo/img/'.$defaultpromo->id.'.'.$img->getClientOriginalExtension());
            $tmb->resize(null, 90, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
            $tmb->save(public_path().'/promo/mini/'.$defaultpromo->id.'.'.$img->getClientOriginalExtension());
        }
        if($defaultpromo->id<>1){
            $defaultpromo->nome=request()->nome;
            $defaultpromo->dom=request()->dom;
            $defaultpromo->seg=request()->seg;
            $defaultpromo->ter=request()->ter;
            $defaultpromo->qua=request()->qua;
            $defaultpromo->qui=request()->qui;
            $defaultpromo->sex=request()->sex;
            $defaultpromo->sab=request()->sab;
            $defaultpromo->inicio=request()->inicio;
            $defaultpromo->fim=request()->fim;
            $defaultpromo->save();
        };
        return redirect('/defaultpromo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\defaultpromo  $defaultpromo
     * @return \Illuminate\Http\Response
     */
    public function destroy(defaultpromo $defaultpromo)
    {
        //
    }
}
