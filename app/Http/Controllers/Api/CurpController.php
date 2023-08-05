<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurpStoreRequest;
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

    /**
     * @OA\post(
     *     path="/api/createCurp",
     *     summary="Agrega Crups",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="nombre",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="apellido_p",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="apellido_m",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="fecha_nacimiento",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="sexo",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="estado",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="curp",
     *                     type="string"
     *                 ),
     *                 example={
     *               "nombre":"Bryan Eliut",
     *               "apellido_p":"Hernandez",
     *               "apellido_m":"Moran",
     *               "fecha_nacimiento":"1997-09-04",
     *               "sexo":"H",
     *               "estado":"HG",
     *               "curp":"HEMB970904HHGRRR00"
     *               }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="El Curp se agrego con exito."
     *     ),
     *     @OA\Response(
     *         response=406,
     *         description="El request es invalido"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ha ocurrido un error."
     *     ),
     * )
     */

    public function create(CurpStoreRequest $request)
    {
        $curp = Curp::create($request->toArray());
        return $curp;
    }
    /**
     * @OA\put(
     *     path="/api/updateCurp",
     *     summary="Actualiza los datos del Crup",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="int"
     *                 ),
     *                 @OA\Property(
     *                     property="nombre",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="apellido_p",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="apellido_m",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="fecha_nacimiento",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="sexo",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="estado",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="curp",
     *                     type="string"
     *                 ),
     *                 example={
     *               "id":1,
     *               "nombre":"Bryan Eliud",
     *               "apellido_p":"Hernandez",
     *               "apellido_m":"Moran",
     *               "fecha_nacimiento":"1997-09-04",
     *               "sexo":"H",
     *               "estado":"HG",
     *               "curp":"HEMB970904HHGRRR00"
     *               }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="El Curp se agrego con exito."
     *     ),
     *     @OA\Response(
     *         response=406,
     *         description="El request es invalido"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ha ocurrido un error."
     *     ),
     * )
     */

    public function update(CurpStoreRequest $request)
    {
        $curp=Curp::where('curp', $request->curp)->update($request->all());
        $curp=Curp::where('curp', $request->curp)->get();
        return $curp;
    }
}