<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;


/**
 *
 * @OA\Get(
 *       path="/api/users",
 *       tags={"Users"},
 *       summary="Get all users",
 *       description="Returns a list of all users",
 *       security={{ "bearerAuth": {} }},
 *       @OA\Response(
 *           response=200,
 *           description="successful operation",
 *           @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *                   @OA\Property(property="name", type="string", example="Abbos"),
 *                   @OA\Property(property="avatar", type="string", example="abc123.jpg"),
 *                   @OA\Property(property="email", type="string", example="user@gmail.com"),
 *                   @OA\Property(property="password", type="string", example="abc123"),
 *                   @OA\Property(property="role_id", type="integer", example=2),
 *              )
 *           )
 *       )
 *  )
 *
 * @OA\Post(
 *     path="/api/users",
 *     tags={"Users"},
 *     summary="Create a new user",
 *     security={{ "bearerAuth": {} }},
 *     @OA\RequestBody(
 *       required=true,
 *       @OA\JsonContent(
 *         @OA\Property(property="name", type="string", example="Abbos"),
 *         @OA\Property(property="avatar", type="string", example="abc123.jpg"),
 *         @OA\Property(property="email", type="string", example="user@gmail.com"),
 *         @OA\Property(property="password", type="string", example="abc123"),
 *         @OA\Property(property="role_id", type="integer", nullable=true, example=2)
 *       )
 *     ),
 *     @OA\Response(
 *       response=201,
 *       description="User created successfully",
 *       @OA\JsonContent(
 *         @OA\Property(property="data", type="object",
 *           @OA\Property(property="name", type="string", example="Abbos"),
 *           @OA\Property(property="avatar", type="string", example="abc123.jpg"),
 *           @OA\Property(property="email", type="string", example="user@gmail.com"),
 *           @OA\Property(property="password", type="string", example="abc123"),
 *           @OA\Property(property="role_id", type="integer", example=2)
 *         )
 *       )
 *     )
 *  )
 *
 *
 * @OA\Get(
 *       path="/api/users/{id}",
 *       tags={"Users"},
 *       summary="Get a user by ID",
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter(
 *           name="id",
 *           in="path",
 *           description="ID of the user to return",
 *           required=true,
 *           @OA\Schema(type="integer")
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="successful operation",
 *           @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *                   @OA\Property(property="name", type="string", example="Abbos"),
 *                   @OA\Property(property="avatar", type="string", example="abc123.jpg"),
 *                   @OA\Property(property="email", type="string", example="user@gmail.com"),
 *                   @OA\Property(property="password", type="string", example="abc123"),
 *                   @OA\Property(property="role_id", type="integer", example=2)
 *               )
 *           )
 *       )
 *  )
 *
 *
 * @OA\Put(
 *     path="/api/users/{id}",
 *     tags={"Users"},
 *     summary="Update a user",
 *     security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *       name="id",
 *       in="path",
 *       description="ID of user to update",
 *       required=true,
 *       @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *       required=true,
 *       @OA\JsonContent(
 *         @OA\Property(property="name", type="string", example="Abbos"),
 *         @OA\Property(property="avatar", type="string", example="abc123.jpg"),
 *         @OA\Property(property="email", type="string", example="user@gmail.com"),
 *         @OA\Property(property="password", type="string", example="abc123"),
 *         @OA\Property(property="role_id", type="integer", example=2)
 *       )
 *     ),
 *     @OA\Response(
 *       response=200,
 *       description="User updated successfully",
 *       @OA\JsonContent(
 *         @OA\Property(property="data", type="object",
 *           @OA\Property(property="name", type="string", example="Abbos"),
 *           @OA\Property(property="avatar", type="string", example="abc123.jpg"),
 *           @OA\Property(property="email", type="string", example="user@gmail.com"),
 *           @OA\Property(property="password", type="string", example="abc123"),
 *           @OA\Property(property="role_id", type="integer", example=2)
 *         )
 *       )
 *     )
 *  )
 *
 *
 * @OA\Delete(
 *       path="/api/users/{id}",
 *       tags={"Users"},
 *       summary="Delete a user",
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter(
 *           name="id",
 *           in="path",
 *           description="ID of user to delete",
 *           required=true,
 *           @OA\Schema(type="integer")
 *       ),
 *       @OA\Response(
 *           response=204,
 *           description="User deleted successfully"
 *       )
 *  )
 *
 */

class UserController extends Controller
{

}
