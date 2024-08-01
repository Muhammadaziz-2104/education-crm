<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *      path="/api/rooms",
 *      tags={"Rooms"},
 *      summary="Get list of rooms",
 *      description="Returns list of rooms",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="number", type="number", example=101),
 *                  @OA\Property(property="quantity_of_tables", type="integer", example=20),
 *                  @OA\Property(property="description", type="string", example="First floor room")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Post(
 *      path="/api/rooms",
 *      tags={"Rooms"},
 *      summary="Create a new room",
 *      security={{ "bearerAuth": {} }},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="number", type="number", example=101),
 *              @OA\Property(property="quantity_of_tables", type="integer", example=20),
 *              @OA\Property(property="description", type="string", example="First floor room")
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Room created successfully",
 *          @OA\JsonContent(
 *              @OA\Schema(
 *                  @OA\Property(property="room", type="object",
 *                      @OA\Property(property="number", type="number", example=101),
 *                      @OA\Property(property="quantity_of_tables", type="integer", example=20),
 *                      @OA\Property(property="description", type="string", example="First floor room")
 *                  )
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Get(
 *      path="/api/rooms/{id}",
 *      tags={"Rooms"},
 *      summary="Get a room by ID",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the room to return",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="room", type="object",
 *                  @OA\Property(property="number", type="number", example=101),
 *                  @OA\Property(property="quantity_of_tables", type="integer", example=20),
 *                  @OA\Property(property="description", type="string", example="First floor room")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Put(
 *      path="/api/rooms/{id}",
 *      tags={"Rooms"},
 *      summary="Update a room",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of room to update",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="number", type="number", example=101),
 *              @OA\Property(property="quantity_of_tables", type="integer", example=20),
 *              @OA\Property(property="description", type="string", example="First floor room")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Room updated successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="number", type="number", example=101),
 *                  @OA\Property(property="quantity_of_tables", type="integer", example=20),
 *                  @OA\Property(property="description", type="string", example="First floor room")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Delete(
 *      path="/api/rooms/{id}",
 *      tags={"Rooms"},
 *      summary="Delete a room",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of room to delete",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=204,
 *          description="Room deleted successfully"
 *      ),
 *        @OA\Response(
 *           response=404,
 *           description="Room not found"
 *       )
 *
 *
 *  )
 */

class RoomController extends Controller
{

}
