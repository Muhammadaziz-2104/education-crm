<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *       path="/api/teachers",
 *       tags={"Teachers"},
 *       summary="Get list of teachers",
 *       description="Returns list of teachers",
 *     security={{ "bearerAuth": {} }},
 *       @OA\Response(
 *           response=200,
 *           description="successful operation",
 *           @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *                   @OA\Property(property="name", type="string", example="John Doe"),
 *                   @OA\Property(property="skill_id", type="integer", example=1),
 *                   @OA\Property(property="room_id", type="integer", example=1),
 *                   @OA\Property(property="course_id", type="integer", example=1),
 *                   @OA\Property(property="user_id", type="integer", example=1),
 *                   @OA\Property(property="phone", type="string", example="+123456789"),
 *                   @OA\Property(property="salary", type="integer", example=50000),
 *               ),
 *           )
 *       )
 *   )
 *
 * @OA\Post(
 *       path="/api/teachers",
 *       tags={"Teachers"},
 *       summary="Create a new teacher",
 *       security={{ "bearerAuth": {} }},
 *       @OA\RequestBody(
 *           required=true,
 *           @OA\JsonContent(
 *               @OA\Property(property="name", type="string", example="John Doe"),
 *               @OA\Property(property="skill_id", type="integer", example=1),
 *               @OA\Property(property="room_id", type="integer", example=1),
 *               @OA\Property(property="course_id", type="integer", example=1),
 *               @OA\Property(property="user_id", type="integer", example=1),
 *               @OA\Property(property="phone", type="string", example="+123456789"),
 *               @OA\Property(property="salary", type="integer", example=50000),
 *           ),
 *       ),
 *       @OA\Response(
 *           response=201,
 *           description="Teacher created successfully",
 *           @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *                   @OA\Property(property="name", type="string", example="John Doe"),
 *                   @OA\Property(property="skill_id", type="integer", example=1),
 *                   @OA\Property(property="room_id", type="integer", example=1),
 *                   @OA\Property(property="course_id", type="integer", example=1),
 *                   @OA\Property(property="user_id", type="integer", example=1),
 *                   @OA\Property(property="phone", type="string", example="+123456789"),
 *                   @OA\Property(property="salary", type="integer", example=50000),
 *               ),
 *           ),
 *       ),
 *   )
 *
 *
 *
 * @OA\Post(
 *        path="/api/teachers/{teacherId}/add-course",
 *        tags={"Teachers"},
 *        summary="Add a course to a teacher",
 *        description="Adds a course to a specific teacher",
 *        security={{ "bearerAuth": {} }},
 *        @OA\Parameter(
 *            name="teacherId",
 *            in="path",
 *            description="ID of the teacher",
 *            required=true,
 *            @OA\Schema(type="integer")
 *        ),
 *        @OA\RequestBody(
 *            required=true,
 *            @OA\JsonContent(
 *                @OA\Property(property="course_id", type="integer", example=1)
 *            )
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="Course added to teacher successfully",
 *            @OA\JsonContent(
 *                @OA\Property(property="message", type="string", example="Course added to teacher successfully")
 *            )
 *        ),
 *        @OA\Response(
 *            response=204,
 *            description="Course added to teacher successfully",
 *            @OA\JsonContent(
 *                @OA\Property(property="message", type="string", example="Course added to teacher successfully")
 *            )
 *        ),
 *        @OA\Response(
 *            response=400,
 *            description="Bad Request",
 *            @OA\JsonContent(
 *                @OA\Property(property="error", type="string", example="Invalid data provided")
 *            )
 *        ),
 *        @OA\Response(
 *            response=404,
 *            description="Teacher or Course not found",
 *            @OA\JsonContent(
 *                @OA\Property(property="error", type="string", example="Teacher or Course not found")
 *            )
 *        )
 *    )
 *
 *
 * @OA\Get(
 *       path="/api/teachers/{id}",
 *       tags={"Teachers"},
 *       summary="Get a teacher by ID",
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter(
 *           name="id",
 *           in="path",
 *           description="ID of the teacher to return",
 *           required=true,
 *           @OA\Schema(type="integer")
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="successful operation",
 *           @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *                 @OA\Property(property="name", type="string", example="John Doe"),
 *                 @OA\Property(property="phone", type="string", example="+123456789"),
 *                 @OA\Property(property="salary", type="integer", example=50000),
 *              )
 *           )
 *       )
 *   )
 *
 *
 * @OA\Put(
 *        path="/api/teachers/{id}",
 *        tags={"Teachers"},
 *        summary="Update a teacher",
 *        security={{ "bearerAuth": {} }},
 *        @OA\Parameter(
 *            name="id",
 *            in="path",
 *            description="ID of teacher to update",
 *            required=true,
 *            @OA\Schema(type="integer")
 *        ),
 *        @OA\RequestBody(
 *            required=true,
 *            @OA\JsonContent(
 *                 @OA\Property(property="name", type="string", example="John Doe"),
 *                 @OA\Property(property="skill_id", type="integer", example=1),
 *                 @OA\Property(property="room_id", type="integer", example=1),
 *                 @OA\Property(property="course_id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="phone", type="string", example="+123456789"),
 *                 @OA\Property(property="salary", type="integer", example=50000),
 *            ),
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="Teacher updated successfully",
 *            @OA\JsonContent(
 *                 @OA\Property(property="data", type="object",
 *                 @OA\Property(property="name", type="string", example="John Doe"),
 *                 @OA\Property(property="skill_id", type="integer", example=1),
 *                 @OA\Property(property="room_id", type="integer", example=1),
 *                 @OA\Property(property="course_id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="phone", type="string", example="+123456789"),
 *                 @OA\Property(property="salary", type="integer", example=50000),
 *            ),
 *          ),
 *       ),
 *    )
 *
 * @OA\Delete(
 *        path="/api/teachers/{id}",
 *        tags={"Teachers"},
 *        summary="Delete a teacher",
 *        security={{ "bearerAuth": {} }},
 *        @OA\Parameter(
 *            name="id",
 *            in="path",
 *            description="ID of teacher to delete",
 *            required=true,
 *            @OA\Schema(type="integer")
 *        ),
 *        @OA\Response(
 *            response=204,
 *            description="Teacher deleted successfully"
 *        ),
 *       @OA\Response(
 *           response=404,
 *           description="Teacher not found"
 *       )
 *    )
*/

class TeacherController extends Controller
{

}
