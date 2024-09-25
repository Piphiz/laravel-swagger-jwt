<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use Illuminate\Http\Request;

class ComercioController extends Controller
{

    /**
     * @OA\Get(
     *     tags={"Comercio"},
     *     path="/api/comercios",
     *     summary="Get Comercios List",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de comércios",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="nome", type="string", example="Nome do Comércio"),
     *                 @OA\Property(property="endereco", type="string", example="Endereço do Comércio"),
     *                 @OA\Property(property="telefone", type="string", example="123456789"),
     *             )
     *         )
     *     ),
     *     @OA\Header(
     *         header="Accept",
     *         description="Tipo de conteúdo aceito",
     *         @OA\Schema(type="string", example="application/json")
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function index()
    {
        return Comercio::all();
    }

    /**
     * @OA\Get(
     *     tags={"Comercio"},
     *     path="/api/comercios/{id}",
     *     summary="Get Comercio by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalhes do comércio",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="nome", type="string", example="Nome do Comércio"),
     *             @OA\Property(property="endereco", type="string", example="Endereço do Comércio"),
     *             @OA\Property(property="telefone", type="string", example="123456789"),
     *         )
     *     ),
     *     @OA\Response(response=404, description="Comércio não encontrado"),
     *     @OA\Header(
     *         header="Accept",
     *         description="Tipo de conteúdo aceito",
     *         @OA\Schema(type="string", example="application/json")
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function show($id)
    {
        $comercio = Comercio::find($id);

        if (!$comercio) {
            return response()->json(['message' => 'Comércio não encontrado'], 404);
        }

        return $comercio;
    }
}
