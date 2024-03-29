<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Redirect;
use Session;
class UsuariosController extends Controller
{
    //
    public function index(){
        $usuarios = Usuario::get();
        return view('usuarios.list', ['usuarios' => $usuarios]);
    }
    public function new(){
        return view('usuarios.form');
    }
    public function add( Request $request ){
        $usuario = new Usuario;
        $usuario = $usuario->create( $request->all());
        //\Session::flash('msg_add', 'Usuário salvo com sucesso!');
        return Redirect::to('/usuarios')->with('msg', 'Usuário foi criado com sucesso!');
    }
    public function edit( $id ){
        $usuario = Usuario::findOrFail( $id );
        return view('usuarios.form', ['usuario' => $usuario]);
    }
    public function update( $id, Request $request ){
        $usuario = Usuario::findOrFail( $id );
        $usuario->update( $request->all());
        //\Session::flash('msg', 'This is a message!');
        return Redirect::to('/usuarios')->with('msg', 'Usuário foi atualizado!');
    }
    public function delete($id){
        $usuario = Usuario::findOrFail( $id );
        $usuario->delete();
        return Redirect::to('/usuarios')->with('msg', 'Usuário foi deletado!');
    }
}
