<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Get(
 *      path="/api/skills",
 *      tags={"Skills"},
 *      summary="Get list of skills",
 *      description="Returns list of skills",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="description", type="string", example="xona")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Post(
 *      path="/api/skills",
 *      tags={"Skills"},
 *      summary="Create a new skill",
 *      security={{ "bearerAuth": {} }},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="name", type="string", example="Abbos"),
 *              @OA\Property(property="description", type="string", example="10-xona")
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Skill created successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="description", type="string", example="10-xona")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Get(
 *      path="/api/skills/{id}",
 *      tags={"Skills"},
 *      summary="Get a skill by ID",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the skill to return",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="description", type="string", example="10-xona")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Put(
 *      path="/api/skills/{id}",
 *      tags={"Skills"},
 *      summary="Update a skill",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of skill to update",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="name", type="string", example="Abbos"),
 *              @OA\Property(property="description", type="string", example="10-xona")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Skill updated successfully",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="name", type="string", example="Abbos"),
 *                  @OA\Property(property="description", type="string", example="10-xona")
 *              )
 *          )
 *      )
 *  )
 *
 * @OA\Delete(
 *      path="/api/skills/{id}",
 *      tags={"Skills"},
 *      summary="Delete a skill",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of skill to delete",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=204,
 *          description="Skill deleted successfully"
 *      ),
 *        @OA\Response(
 *           response=404,
 *           description="Skill not found"
 *       )
 *  )
 */



class SkillController extends Controller
{

}
