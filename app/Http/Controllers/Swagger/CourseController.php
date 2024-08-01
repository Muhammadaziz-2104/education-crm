<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *      path="/api/courses",
 *      tags={"Courses"},
 *      summary="Get list of courses",
 *      description="Returns list of courses",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="name", type="string", example="Math 101"),
 *                  @OA\Property(property="description", type="string", example="Basic mathematics"),
 *                  @OA\Property(property="price", type="integer", example=3),
 *                  @OA\Property(property="room_id", type="integer", example=1)
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Post(
 *      path="/api/courses",
 *      tags={"Courses"},
 *      summary="Create a new course",
 *      security={{ "bearerAuth": {} }},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="name", type="string", example="Math 101"),
 *              @OA\Property(property="description", type="string", example="Basic mathematics"),
 *              @OA\Property(property="price", type="integer", example=3),
 *              @OA\Property(property="room_id", type="integer", example=1)
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Course created successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="course", type="object",
 *                  @OA\Property(property="name", type="string", example="Math 101"),
 *                  @OA\Property(property="description", type="string", example="Basic mathematics"),
 *                  @OA\Property(property="price", type="integer", example=3),
 *                  @OA\Property(property="room_id", type="integer", example=1)
 *              )
 *          )
 *      )
 *  )
 *
 *
 * @OA\Post(
 *      path="/api/courses/{courseId}/add-student",
 *      tags={"Courses"},
 *      summary="Add a student to a course",
 *      description="Adds a student to a specific course",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="courseId",
 *          in="path",
 *          description="ID of the course",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="student_id", type="integer", example=1)
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Student added to course successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Student added to course successfully")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Bad Request",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Invalid data provided")
 *          )
 *      ),
 *        @OA\Response(
 *           response=404,
 *           description="Student not found"
 *       )
 *  )
 *
 * @OA\Get(
 *       path="/api/courses/{id}",
 *       tags={"Courses"},
 *       summary="Get a course by ID",
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter(
 *           name="id",
 *           in="path",
 *           description="ID of the course to return",
 *           required=true,
 *           @OA\Schema(type="integer")
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="successful operation",
 *           @OA\JsonContent(
 *               @OA\Property(property="course", type="object",
 *                   @OA\Property(property="name", type="string", example="Math 101"),
 *                   @OA\Property(property="description", type="string", example="Basic mathematics"),
 *                   @OA\Property(property="price", type="integer", example=3),
 *                   @OA\Property(property="student-count", type="integer", example=3),
 *                   @OA\Property(property="room_id", type="integer", example=1)
 *               )
 *           )
 *       )
 *   )
 *
 * @OA\Put(
 *      path="/api/courses/{id}",
 *      tags={"Courses"},
 *      summary="Update a course",
 *     security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of course to update",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="name", type="string", example="Math 101"),
 *              @OA\Property(property="description", type="string", example="Basic mathematics"),
 *              @OA\Property(property="price", type="integer", example=3),
 *              @OA\Property(property="room_id", type="integer", example=1)
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Course updated successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="course", type="object",
 *                  @OA\Property(property="name", type="string", example="Math 101"),
 *                  @OA\Property(property="description", type="string", example="Basic mathematics"),
 *                  @OA\Property(property="price", type="integer", example=3),
 *                  @OA\Property(property="room_id", type="integer", example=1)
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Delete(
 *      path="/api/courses/{id}",
 *      tags={"Courses"},
 *      summary="Delete a course",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of course to delete",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=204,
 *          description="Course deleted successfully"
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Course not found"
 *      )
 *  )
 */

class CourseController extends Controller
{

}
