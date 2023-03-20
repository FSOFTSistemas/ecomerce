<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empresa.banners');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.banners');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = 0;

        $dados = $request->all();

        try {
            if ($request->hasFile('BannerMain') && $request->hasFile('Banner2') && $request->hasFile('Banner3')) {

                                                        // FOTO 1
                $imagem = $request->file('BannerMain');
                $num = rand(1111, 9999);
                $dir = "img/banner_main";
                $ext = $imagem->guessClientExtension();
                $nomeImagem = "imagem_" . $num . "." . $ext;
                $imagem->move($dir, $nomeImagem);
                $dados['BannerMain'] = $dir . "/" . $nomeImagem;

                                                        // FOTO 2
                $imagem = $request->file('Banner2');
                $num = rand(1111, 9999);
                $dir = "img/banner_2";
                $ext = $imagem->guessClientExtension();
                $nomeImagem = "imagem_" . $num . "." . $ext;
                $imagem->move($dir, $nomeImagem);
                $dados['Banner2'] = $dir . "/" . $nomeImagem;

                                                        // FOTO 3

                $imagem = $request->file('Banner3');
                $num = rand(1111, 9999);
                $dir = "img/banner_3";
                $ext = $imagem->guessClientExtension();
                $nomeImagem = "imagem_" . $num . "." . $ext;
                $imagem->move($dir, $nomeImagem);
                $dados['Banner3'] = $dir . "/" . $nomeImagem;

            Banner::create($dados);

            $banner = Banner::all();
            return view('empresa.banners', ['banner' => $banner]);

        } else {
            return view('empresa.banners');
        }
        } catch (Exception $e) {
            return $res;
        }


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
