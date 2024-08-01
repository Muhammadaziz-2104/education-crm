<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;


/**
 * @OA\Schema(
 *     schema="Teacher",
 *       type="object",
 *       title="Teacher",
 *       required={"id", "name", "skill_id","room_id","user_id","course_id","phone","salary"},
 *       @OA\Property(property="id", type="integer", example=1),
 *       @OA\Property(property="name", type="string", example="John Doe"),
 *       @OA\Property(property="skill_id", type="integer", example=1),
 *       @OA\Property(property="room_id", type="integer", example=1),
 *       @OA\Property(property="user_id", type="integer", example=1),
 *       @OA\Property(property="course_id", type="integer", example=1),
 *       @OA\Property(property="phone", type="string", example="+123456789"),
 *       @OA\Property(property="salary", type="integer", example=50000),
 * )
 */

/**
 * @OA\Schema(
 *     schema="Skill",
 *     type="object",
 *     title="Skill",
 *     required={"name","description"},
 *      @OA\Property(property="name", type="string", example="PHP"),
 *      @OA\Property(property="description", type="string", example="A popular general-purpose scripting language"),
 *     @OA\Property(
 *         property="teachers",
 *         type="array",
 *         @OA\Items(
 *             type="object",
 *               @OA\Property(property="name", type="string", example="John Doe"),
 *               @OA\Property(property="skill_id", type="integer", example=1),
 *               @OA\Property(property="room_id", type="integer", example=1),
 *               @OA\Property(property="user_id", type="integer", example=1),
 *               @OA\Property(property="course_id", type="integer", example=1),
 *               @OA\Property(property="phone", type="string", example="+123456789"),
 *               @OA\Property(property="salary", type="integer", example=50000),
 *         )
 *     )
 * )
 */
class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
