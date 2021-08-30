<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hora;
use Redirect;
use Session;
use khill\Lavacharts\lavacharts;
class HorasController extends Controller
{
    //
    public function index(){
        $horas = Hora::get();
        $tempo =array(0,0,0,0);
        //somar horas
        //debug_to_console("123");
        return view('horas.listH', ['horas' => $horas]); //, ['horas' => $horas]

    }
    public function new(){
        return view('horas.formH');
    }
    public function add( Request $request ){
        $hora = new Hora;
        $hora = $hora->create( $request->all());
        //\Session::flash('msg_add', 'Usuário salvo com sucesso!');
        return Redirect::to('/horas')->with('msg', 'Registro foi criado com sucesso!');
    }
    public function edit( $id ){
        $hora = Hora::findOrFail( $id );
        return view('horas.formH', ['hora' => $hora]);
    }
    public function update( $id, Request $request ){
        $hora = Hora::findOrFail( $id );
        $hora->update( $request->all());
        //\Session::flash('msg', 'This is a message!');
        return Redirect::to('/horas')->with('msg', 'Registro foi atualizado!');
    }
    public function delete($id){
        $hora = Hora::findOrFail( $id );
        $hora->delete();
        return Redirect::to('/horas')->with('msg', 'Usuário foi deletado!');
    }/**/
}
