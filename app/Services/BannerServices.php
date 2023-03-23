<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Banner;
use Exception;

class BannerServices
{

    public function __construct()
    {
    }

    // salva um produto na bd
    public function inserir($foto1, $foto2, $foto3)
    {
        $res = 0;

        try {
            $res = Banner::create([
                'foto1' => $foto1,
                'foto2' => $foto2,
                'foto3' => $foto3
            ]);
        } catch (Exception $e) {
            $res = 0;
        }

        return $res;
    }

    public function atualizar($foto1, $foto2, $foto3, $id)
    {
        $res = 0;

        try {
            $banners = Banner::findOrFail($id);
            $res = $banners->update([
                'foto1' => $foto1,
                'foto2' => $foto2,
                'foto3' => $foto3
            ]);
        } catch (Exception $e) {
            $res = 0;
        }

        return $res;
    }
}
