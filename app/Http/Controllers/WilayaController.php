<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kossa\AlgerianCities\Commune;
use Kossa\AlgerianCities\Wilaya;

class WilayaController extends Controller
{

    public function index()
    {
        $wilayas = Wilaya::all();
        return response()->json(['data' => $wilayas]);
    }

    /**
     * @param $wilaya
     * @return JsonResponse
     */
    public function cities($wilaya)
    {
        $cities = Commune::where('wilaya_id', $wilaya)->get();
        return response()->json(['data' => $cities]);
    }
}
