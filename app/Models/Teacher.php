<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Course",
 *     type="object",
 *     title="Course",
 *     required={"id", "name", "description", "duration"},
 *       @OA\Property(property="id", type="integer", example=1),
 *       @OA\Property(property="name", type="string", example="Mathematics 101"),
 *       @OA\Property(property="description", type="string", example="Basic Mathematics course"),
 *       @OA\Property(property="price", type="integer", example=300),
 *       @OA\Property(property="room_id", type="integer", example=2),
 * )
 */

/**
 * @OA\Schema(
 *     schema="Skill",
 *     type="object",
 *     title="Skill",
 *     required={"id", "name", "description"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Advanced Mathematics"),
 *     @OA\Property(property="description", type="string", example="Advanced level mathematics skill")
 * )
 */


/**
 * @OA\Schema(
 *     schema="Room",
 *     type="object",
 *     title="Room",
 *     required={"id", "number", "quantity_of_table", "description"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="number", type="integer", example=101),
 *     @OA\Property(property="quantity_of_table", type="integer", example=10),
 *     @OA\Property(property="description", type="string", example="Advanced level mathematics skill")
 * )
 */

/**
 *
 * @OA\Schema(
 *       schema="Teacher",
 *       type="object",
 *       title="Teacher",
 *       required={"id", "name", "skill_id","room_id","user_id","course_id","phone","salary"},
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="name", type="string", example="John Doe"),
 *                @OA\Property(property="skill_id", type="integer", example=1),
 *                @OA\Property(property="room_id", type="integer", example=1),
 *                @OA\Property(property="user_id", type="integer", example=1),
 *                @OA\Property(property="course_id", type="integer", example=1),
 *                @OA\Property(property="phone", type="string", example="+123456789"),
 *                @OA\Property(property="salary", type="integer", example=50000),
 *       @OA\Property(
 *           property="course",
 *           type="array",
 *           @OA\Items(
 *               type="object",
 *               @OA\Property(property="id", type="integer", example=1),
 *               @OA\Property(property="name", type="string", example="Mathematics 101"),
 *               @OA\Property(property="description", type="string", example="Basic Mathematics course"),
 *               @OA\Property(property="price", type="integer", example=300),
 *               @OA\Property(property="room_id", type="integer", example=2),
 *           )
 *       ),
 *      @OA\Property(
 *          property="skill",
 *          type="array",
 *          @OA\Items(
 *                type="object",
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="name", type="string", example="Advanced Mathematics"),
 *                @OA\Property(property="description", type="string", example="Advanced level mathematics skill")
 *            )
 *      ),
 *      @OA\Property(
 *          property="room",
 *          type="array",
 *          @OA\Items(
 *                type="object",
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="number", type="string", example=101),
 *                @OA\Property(property="quantity_of_table", type="integer", example=10),
 *                @OA\Property(property="description", type="string", example="Advanced level mathematics skill")
 *            )
 *      ),
 *   )
 *
 */


class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'skill_id',
        'room_id',
        'user_id',
        'course_id',
        'phone',
        'salary',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

//    public function students()
//    {
//        return $this->belongsTo(Student::class, 'student_id');
//    }


}
