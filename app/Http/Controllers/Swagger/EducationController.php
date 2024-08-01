<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *      path="/api/educations",
 *      tags={"Educations"},
 *      summary="Get list of educations",
 *      description="Returns list of educations",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="phone", type="string", example="+998901234567"),
 *                  @OA\Property(property="course_count", type="integer", example=3),
 *                  @OA\Property(property="student_count", type="integer", example=10),
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Post(
 *      path="/api/educations",
 *      tags={"Educations"},
 *      summary="Create a new education",
 *      security={{ "bearerAuth": {} }},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="name", type="string", example="Abbos"),
 *              @OA\Property(property="phone", type="string", example="+998901234567")
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Education created successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="phone", type="string", example="+998901234567")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Get(
 *      path="/api/educations/{id}",
 *      tags={"Educations"},
 *      summary="Get an education by ID",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the education to return",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="phone", type="string", example="+998901234567"),
 *                  @OA\Property(property="course_count", type="integer", example=3),
 *                  @OA\Property(property="student_count", type="integer", example=10),
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Put(
 *      path="/api/educations/{id}",
 *      tags={"Educations"},
 *      summary="Update an education",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of education to update",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="name", type="string", example="Abbos"),
 *              @OA\Property(property="phone", type="string", example="+998901234567")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Education updated successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="phone", type="string", example="+998901234567")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Delete(
 *      path="/api/educations/{id}",
 *      tags={"Educations"},
 *      summary="Delete an education",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of education to delete",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=204,
 *          description="Education deleted successfully"
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Education not found"
 *      )
 *  )
 */


class EducationController extends Controller
{
}
