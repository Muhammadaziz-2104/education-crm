<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;


/**
 * @OA\Post(
 *     path="/api/auth/login",
 *     summary="Login",
 *     tags={"Authentication"},
 *     description="Login with email and password",
 *     operationId="loginUser",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="email", type="string", format="email", example="user@gmail.com"),
 *             @OA\Property(property="password", type="string", format="password", example="abc123"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                       @OA\Property(property="email", type="string", format="email", example="user@gmail.com"),
 *                       @OA\Property(property="password", type="string", format="password", example="abc123"),
 *              ),
 *          ),
 *     ),
 * ),
 *
 *
 *
 *
 *
 */
class AuthController extends Controller
{

}
