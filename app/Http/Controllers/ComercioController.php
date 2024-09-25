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
     *     @OA\Response(response="200", description="Success"),
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
     *     summary="Get a Comercio by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Comércio não encontrado"),
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
