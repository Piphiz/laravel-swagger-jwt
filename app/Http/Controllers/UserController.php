<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *     tags={"Auth"},
     *     path="/api/register",
     *     summary="Register a new user",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="201", description="User registered successfully"),
     *     @OA\Response(response="400", description="Processing errors"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
     */
    public function register(UserRequest $request)
    {
        DB::beginTransaction();

        try {
            $request['password'] = bcrypt($request['password']);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>$request->password,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'token' => $user->createToken('comercio')->plainTextToken,
                'message' => 'Usuario cadastrado com sucesso'
            ], 201);

        } catch (\Exception $e){
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Nao foi possivel cadastrar o usuario'
            ], 400);
        }

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function getUserDetails(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user], 200);
    }
}
