<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\BannerServices;
use Exception;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();

        if ($banners->count() > 0) {

            $img = 'data:image/jpeg;base64,' . $banners[0]->foto1;
            $img2 = 'data:image/jpeg;base64,' . $banners[0]->foto2;
            $img3 = 'data:image/jpeg;base64,' . $banners[0]->foto3;

            return view('empresa.banners', ['banner1' => $img, 'banner2' => $img2, 'banner3' => $img3]);

        } else {

            return view('empresa.banners');

        }

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

        $banners = Banner::all();

        if ($banners->count() == 1) {

            if (empty($request->BannerMain) || empty($request->Banner2) || empty($request->Banner3)) {
                $imagem1 = $request->BannerMain;
                $imagem2 = $request->Banner2;
                $imagem3 = $request->Banner3;
            } else {
                $imgcode1 = $request->BannerMain;
                $imgcode2 = $request->Banner2;
                $imgcode3 = $request->Banner3;

                $imagem1 = $this->encode($imgcode1);
                $imagem2 = $this->encode($imgcode2);
                $imagem3 = $this->encode($imgcode3);
            }

            $servico = new BannerServices();
            $result = $servico->atualizar(
                $imagem1,
                $imagem2,
                $imagem3,
                $banners[0]->id
            );
            Toastr()->success('Banner atualizado', 'Sucesso');
            return redirect()->route('banner.main');

        } else {

            $imgcode1 = $request->BannerMain;
            $imgcode2 = $request->Banner2;
            $imgcode3 = $request->Banner3;

            $imagem1 = $this->encode($imgcode1);
            $imagem2 = $this->encode($imgcode2);
            $imagem3 = $this->encode($imgcode3);

            $servico = new BannerServices();
            $result = $servico->inserir(
                $imagem1,
                $imagem2,
                $imagem3
            );
            Toastr()->success('Banner cadastrado', 'Sucesso');
            return redirect()->route('banner.main');

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

    public function encode($imag)
    {
        return base64_encode(file_get_contents($imag));
    }
}
