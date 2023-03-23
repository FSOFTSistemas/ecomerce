<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class UsuarioController extends Controller
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
        return view('cliente/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // verificar email unico
        $dados = $request->all();
            $arrayEndereco = array();
            $arrayEndereco['rua'] = $dados['rua'];
            $arrayEndereco['numero'] = $dados['numero'];
            $arrayEndereco['bairro'] = $dados['bairro'];
            $arrayEndereco['cidade'] = $dados['cidade'];
            $arrayEndereco['estado'] = $dados['estado'];
            $arrayEndereco['pais'] = $dados['pais'];
            $endereco = Endereco::create($arrayEndereco);

            $arrayPedido = array();
            // $arrayPedido['data'] = now();
            // $arrayPedido['total'] = 0;
            // $arrayPedido['subtotal'] = 0;
            // $arrayPedido['desconto'] = 0;
            // $pedido = Pedido::create($arrayPedido);
            $pedido = Pedido::create();

            /*$dados = [
                'name'=>"Admin",
                'email'=>"admin@mail.com",
                'password'=>bcrypt("12345678"),
            ];
            if(User::where('email','=',$dados['email'])->count()){
                $usuario = User::where('email','=',$dados['email'])->first();
                $usuario->updade($dados);
            }else{
                User::create($dados);
            }*/
            $arrayUser = array();
            $arrayUser['endereco_id'] = $endereco->id;
            $arrayUser['pedido_id'] = $pedido->id;
            $arrayUser['tipo'] = 'cliente';
            $arrayUser['telefone'] = $dados['telefone'];
            $arrayUser['nome'] = $dados['nome'];
            $arrayUser['cpf'] = $dados['cpf'];
            $arrayUser['rg'] = $dados['rg'];
            $arrayUser['email'] = $dados['email'];
            $arrayUser['senha'] = bcrypt($dados['senha']);
            
            // $arrayUser[''] = $dados[''];
            //dd($arrayUser);
            Usuario::create($arrayUser);
            //$user =  new User;
            dd("FEITO");
        
        dd("caiu fora");
        Toastr()->success('Usuário cadastrado', 'Sucesso');
        return redirect()->route('home');
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
