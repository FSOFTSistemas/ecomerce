<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Configuracoes;
use App\Models\Endereco;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfiguracoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Configuracoes::all();

        return view('empresa.create', ['config' => $config]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.cadastraradm');
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

            $user = User::create([
                'tipo' => 'admin',
                'endereco_id' => $endereco->id,
                'telefone'=> $dados['telefone'],
                'nome' => $dados['nome'],
                'cpf'=> $dados['cpf'],
                'rg'=> $dados['rg'],
                'email'=> $dados['email'],
                'senha'=> bcrypt($dados['senha'])
            ]);

        }
        return redirect()->route('home.auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('empresa.cadastraradm');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $eu = User::where('id', '=', $user->id)->get();
        return view('empresa.mudarsenha', ['eu' => $eu]);
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

        if($dados['senha'] == $dados['confirmar_senha'] ){
            $senha = bcrypt($dados['senha']);
            $dados['senha'] = $senha;
            User::find($id)->update($dados);
            return redirect()->route('home.auth');
        } else {
            echo "Senhas não batem!";
            return view('empresa.mudarsenha');
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
        //
    }

    public function criar(Request $request){

        $cfg = Configuracoes::all();
        $dados = $request->all();

        if ($cfg->count() == 0) {
            $arrayConfig = array();
            $arrayConfig['razao_social'] = $dados['razao_social'];
            $arrayConfig['nome_fantazia'] = $dados['nome_fantazia'];
            $arrayConfig['cnpj_cpf'] = $dados['cnpj_cpf'];
            $arrayConfig['ie'] = $dados['ie'];
            $arrayConfig['telefone'] = $dados['telefone'];
            $arrayConfig['endereco'] = $dados['endereco'];
            $arrayConfig['cidade'] = $dados['cidade'];
            $arrayConfig['chave_pix'] = $dados['chave_pix'];
            $arrayConfig['pix_titular'] = $dados['pix_titular'];
            $arrayConfig['tx_id'] = $dados['tx_id'];
            $config = Configuracoes::create($arrayConfig);

            return view('empresa.create');

        } else {
            Configuracoes::find($cfg[0]->id)->update($dados);

            return view('empresa.create');
        }

    }
}
