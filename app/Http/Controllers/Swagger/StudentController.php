<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Session\Store;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *      path="/api/students",
 *      tags={"Students"},
 *      summary="Get list of students",
 *      description="Returns list of students",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *                  @OA\Property(property="data", type="object",
 *                  @OA\Property(property="user_id", type="integer", example=1),
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="email", type="string", example="user@gmail.com"),
 *                  @OA\Property(property="phone", type="string", example="+911217628"),
 *              ),
 *          )
 *      )
 *  )
 *
 * @OA\Post(
 *      path="/api/students",
 *      tags={"Students"},
 *      summary="Create a new student",
 *      security={{ "bearerAuth": {} }},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="user_id", type="integer", example=1),
 *              @OA\Property(property="name", type="string", example="Abbos"),
 *              @OA\Property(property="email", type="string", example="user@gmail.com"),
 *              @OA\Property(property="phone", type="string", example="+911217628"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Student created successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="user_id", type="integer", example=1),
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="email", type="string", example="user@gmail.com"),
 *                  @OA\Property(property="phone", type="string", example="+911217628"),
 *              ),
 *          ),
 *      ),
 *  ),
 *
 * @OA\Get(
 *      path="/api/students/{id}",
 *      tags={"Students"},
 *      summary="Get a student by ID",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the student to return",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                @OA\Property(property="user_id", type="integer", example=1),
 *                @OA\Property(property="name", type="string", example="Abbos"),
 *                @OA\Property(property="email", type="string", example="user@gmail.com"),
 *                @OA\Property(property="phone", type="string", example="911217628"),
 *             )
 *          )
 *      )
 *  )
 *
 *
 * @OA\Put(
 *       path="/api/students/{id}",
 *       tags={"Students"},
 *       summary="Update a student",
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter(
 *           name="id",
 *           in="path",
 *           description="ID of student to update",
 *           required=true,
 *           @OA\Schema(type="integer")
 *       ),
 *       @OA\RequestBody(
 *           required=true,
 *           @OA\JsonContent(
 *                @OA\Property(property="user_id", type="integer", example=1),
 *                @OA\Property(property="name", type="string", example="Abbos"),
 *                @OA\Property(property="email", type="string", example="user@gmail.com"),
 *                @OA\Property(property="phone", type="string", example="+911217628"),
 *           ),
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="Student updated successfully",
 *           @OA\JsonContent(
 *                @OA\Property(property="data", type="object",
 *                @OA\Property(property="user_id", type="integer", example=1),
 *                @OA\Property(property="name", type="string", example="Abbos"),
 *                @OA\Property(property="email", type="string", example="user@gmail.com"),
 *                @OA\Property(property="phone", type="string", example="+911217628"),
 *           ),
 *         ),
 *      ),
 *   )
 *
 * @OA\Delete(
 *       path="/api/students/{id}",
 *       tags={"Students"},
 *       summary="Delete a student",
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter(
 *           name="id",
 *           in="path",
 *           description="ID of student to delete",
 *           required=true,
 *           @OA\Schema(type="integer")
 *       ),
 *       @OA\Response(
 *           response=204,
 *           description="Student deleted successfully"
 *       ),
 *       @OA\Response(
 *          response=404,
 *          description="Student not found"
 *      )
 *   )
 */
class StudentController extends Controller
{

}
