<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servico = new UserController();
        $clientes = $servico->cliente();
        return view('usuarios.usercliente', ['cliente' => $clientes]);
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
            /*
            'endereco_id',
            'pedido_id',
            'tipo',
            'telefone',
            'nome',
            'cpf',
            'rg',
            'email',
            'senha'
            */
            $user = User::create([
                'tipo' => 'cliente',
                'endereco_id' => $endereco->id,
                'telefone'=> $dados['telefone'],
                'nome' => $dados['nome'],
                'cpf'=> $dados['cpf'],
                'rg'=> $dados['rg'],
                'email'=> $dados['email'],
                'senha'=> bcrypt($dados['senha'])
            ]);
            // dd($user);
            $pedido = new Pedido();
            $pedido->status = "pendente";
            $pedido->user_id = $user->id;
            $pedido->save();
            // $arrayUser = array();
            // $arrayUser['endereco_id'] = $endereco->id;
            // $arrayUser['pedido_id'] = $pedido->id;
            // $arrayUser['tipo'] = 'cliente';
            // $arrayUser['telefone'] = $dados['telefone'];
            // $arrayUser['nome'] = $dados['nome'];
            // $arrayUser['cpf'] = $dados['cpf'];
            // $arrayUser['rg'] = $dados['rg'];
            // $arrayUser['email'] = $dados['email'];
            // $arrayUser['senha'] = bcrypt($dados['senha']);

            // $arrayUser[''] = $dados[''];
            //dd($arrayUser);
            //User::create($arrayUser);
            //$user =  new User;
        }
        return redirect()->route('home');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $servico = new UserController();
        $admin = $servico->admin();
        return view('usuarios.useradmin', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        $endereco = Endereco::findorfail($id);

        return view('usuarios.editar', ['user' => $user, 'end' => $endereco]);

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
        User::find($id)->update($dados);
        Endereco::find($id)->update($dados);

        return redirect()->route('home.auth');
    }


    // public function delete($id)
    // {
    //     $user = User::findorfail($id);
    //     return view('usuarios.delete', ['user' => $user]);
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findorfail($id);
            $user->delete();

            // Toastr()->success('Usuário deletado', "Sucesso");
            return redirect()->route('home.auth');
        } catch (Exception $e) {
            // Toastr()->error('Não foi possível deletar Usuário');
            return redirect()->route('home.auth');
        }
    }

    public function cliente(){

        $clientes = DB::table('users')
        ->select('users.*')
        ->where('users.tipo', '=', 'cliente')
        ->get();

        return $clientes;
    }

    public function admin(){

        $admin = DB::table('users')
        ->select('users.*')
        ->where('users.tipo', '=', 'admin')
        ->get();

        // dd($admin);
        return $admin;
    }
}
