<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curp;

/**
* @OA\Info(title="API Usuarios", version="1.0")
*
*/
class CurpController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/getAllCURPS",
     *     summary="Muestra todos los Curps registrados ",
     *     @OA\Response(
     *         response=200,
     *         description="Muestra todos los Curps registrados."
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index()
    {
        return Curp::all();
    }
}