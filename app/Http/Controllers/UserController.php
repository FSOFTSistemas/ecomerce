<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Pedido;
use app\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $dados = $request->all();
        if($dados['senha'] == $dados['confirmar_senha'] ){
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
            // $arrayUser['endereco_id'] = $endereco->id;
            // $arrayUser['pedido_id'] = $pedido->id;
            $arrayUser['tipo'] = 'cliente';
            $arrayUser['telefone'] = $dados['telefone'];
            $arrayUser['nome'] = $dados['nome'];
            $arrayUser['cpf'] = $dados['cpf'];
            $arrayUser['rg'] = $dados['rg'];
            $arrayUser['email'] = $dados['email'];
            $arrayUser['senha'] = bcrypt($dados['senha']);
            
            // $arrayUser[''] = $dados[''];
            //dd($arrayUser);
            //User::create($arrayUser);
            $user =  new User;
            dd("FEITO");
        }
        dd("caiu fora");
        return redirect()->route('home');
        dd($request);
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
}
