<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function entrar(Request $request)
    {
        $dados = $request->all();
        //dd($dados);
        // dd(Auth::attempt(['email'=>$dados['email'],'senha'=> bcrypt($dados['password'])]));
        // if(Auth::attempt(['email'=>$dados['email'],'senha'=>$dados['password']])){
        //     return redirect()->route('home');
        // }
        $usuario = User::where('email', '=', $dados['email'])->first();
        //dd($usuario);
        if ($usuario != null) {
            
            if (Hash::check($dados['password'], $usuario->senha)) {
                //logado
                Auth::login($usuario);
                if(Auth::user()->tipo == "cliente"){
                    return redirect()->route('home');
                }else if(Auth::user()->tipo == "admin"){
                    return redirect()->route('home.auth');
                }
            }
        }

        return redirect()->route('login');
    }
    public function sair()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function testeA(){
        dd("OI admin");
    }
    public function testeC(){
        dd("OI cliente");
    }
}
