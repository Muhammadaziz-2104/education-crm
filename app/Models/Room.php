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
 *
 * @OA\Schema(
 *      schema="Room",
 *      type="object",
 *      title="Room",
 *      required={"id", "number", "quantity_of_tables", "description"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="number", type="integer", example=101),
 *      @OA\Property(property="quantity_of_tables", type="integer", example=20),
 *      @OA\Property(property="description", type="string", example="First floor room"),
 *      @OA\Property(
 *          property="teachers",
 *          type="array",
 *          @OA\Items(
 *              type="object",
 *                @OA\Property(property="name", type="string", example="John Doe"),
 *                 @OA\Property(property="skill_id", type="integer", example=1),
 *                 @OA\Property(property="room_id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="course_id", type="integer", example=1),
 *                 @OA\Property(property="phone", type="string", example="+123456789"),
 *                 @OA\Property(property="salary", type="integer", example=50000)
 *          )
 *      )
 *  )
 *
 *
 */

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'quantity_of_tables',
        'description'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
