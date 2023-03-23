<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servico = new RelatorioController();
        $vendas = $servico->vendas();

        return view('relatorios.vendas', ['vendas' => $vendas]);
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
    public function show()
    {
        $servico = new RelatorioController();
        $pedidos = $servico->pedidos();

        return view('relatorios.pedidos', ['pedidos' => $pedidos]);
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

    public function vendas() {

        $vendas = DB::table('pedidos')
        ->select('pedidos.*')
        ->where('pedidos.status', '=', 'finalizado')
        ->get();

        return $vendas;
    }

    public function pedidos() {

        $pedidos = DB::table('pedidos')
        ->select('pedidos.*')
        ->where('pedidos.status', '=', 'pendente')
        ->get();

        return $pedidos;
    }

    public function filtervendas(Request $request){

        $inicial = Carbon::parse($request->inicial);
        $final = Carbon::parse($request->final);

        $vendas = DB::table('pedidos')
            ->where('pedidos.status', '=', 'finalizado')
            ->where('data', '<=', $final->format('Y-m-d'))
            ->where('data','>=', $inicial->format('Y-m-d'))
            ->get();

        return view('relatorios.vendas', ['vendas' => $vendas]);
    }

    public function filterpedidos(Request $request){

        $inicial = Carbon::parse($request->inicial);
        $final = Carbon::parse($request->final);

        $pedidos = DB::table('pedidos')
            ->where('pedidos.status', '=', 'pendente')
            ->where('data', '<=', $final->format('Y-m-d'))
            ->where('data','>=', $inicial->format('Y-m-d'))
            ->get();

        return view('relatorios.pedidos', ['pedidos' => $pedidos]);
    }

    public function imprimevendas(Request $request) {
        $inicial = Carbon::parse($request->inicial);
        $final = Carbon::parse($request->final);

        $vendas = DB::table('pedidos')
            ->where('pedidos.status', '=', 'finalizado')
            ->where('data', '<=', $final->format('Y-m-d'))
            ->where('data','>=', $inicial->format('Y-m-d'))
            ->get();

        $pdf = Pdf::loadView('relatorios.venda_data', ['vendas' => $vendas, 'dt1' => $inicial, 'dt2' => $final])->setpaper('A4');
        return $pdf->stream(date('Y-m-d_H-i-s').'_vendas.pdf');
    }

    public function imprimepedidos(Request $request) {
        $inicial = Carbon::parse($request->inicial);
        $final = Carbon::parse($request->final);

        $pedidos = DB::table('pedidos')
            ->where('pedidos.status', '=', 'pendente')
            ->where('data', '<=', $final->format('Y-m-d'))
            ->where('data','>=', $inicial->format('Y-m-d'))
            ->get();

        $pdf = Pdf::loadView('relatorios.pedido_data', ['pedidos' => $pedidos, 'dt1' => $inicial, 'dt2' => $final])->setpaper('A4');
        return $pdf->stream(date('Y-m-d_H-i-s').'_vendas.pdf');
    }

}
