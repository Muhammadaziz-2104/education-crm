<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;


/**
 * @OA\Schema(
 *     schema="Teacher",
 *     type="object",
 *     title="teacher",
 *     required={"id", "name", "skill_id","room_id","user_id","course_id","phone","salary"},
 *        @OA\Property(property="id", type="integer", example=1),
 *       @OA\Property(property="name", type="string", example="John Doe"),
 *                 @OA\Property(property="skill_id", type="integer", example=1),
 *                 @OA\Property(property="room_id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="course_id", type="integer", example=1),
 *                 @OA\Property(property="phone", type="string", example="+123456789"),
 *                 @OA\Property(property="salary", type="integer", example=50000),
 * )
 */

/**
 *
 * @OA\Schema(
 *       schema="Teacher",
 *       type="object",
 *       title="Teacher",
 *       required={"id", "name", "skill_id","room_id","user_id","course_id","phone","salary"},
 *       @OA\Property(property="id", type="integer", example=1),
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
 *        @OA\Property(property="name", type="string", example="John Doe"),
 *                  @OA\Property(property="skill_id", type="integer", example=1),
 *                  @OA\Property(property="room_id", type="integer", example=1),
 *                  @OA\Property(property="user_id", type="integer", example=1),
 *                  @OA\Property(property="course_id", type="integer", example=1),
 *                  @OA\Property(property="phone", type="string", example="+123456789"),
 *                  @OA\Property(property="salary", type="integer", example=50000),
 *           )
 *       )
 *   )
 *
 */




/**
 * @OA\Schema(
 *     schema="Student",
 *     type="object",
 *     title="Student",
 *     required={"id", "name", "email", "phone"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Abbos"),
 *     @OA\Property(property="email", type="string", example="user@gmail.com"),
 *     @OA\Property(property="phone", type="string", example="911217628")
 * )
 */

/**
 *
 * @OA\Schema(
 *      schema="Course",
 *      type="object",
 *      title="Course",
 *      required={"id", "name", "description", "duration"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="Mathematics 101"),
 *      @OA\Property(property="description", type="string", example="Basic Mathematics course"),
 *      @OA\Property(property="price", type="integer", example=300),
 *      @OA\Property(property="room_id", type="integer", example=2),
 *      @OA\Property(
 *          property="students",
 *          type="array",
 *          @OA\Items(
 *              type="object",
 *              @OA\Property(property="user_id", type="integer", example=1),
 *              @OA\Property(property="name", type="string", example="Abbos"),
 *              @OA\Property(property="email", type="string", example="user@gmail.com"),
 *              @OA\Property(property="phone", type="string", example="911217628")
 *          )
 *      )
 *  )
 *
 */

class Course extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'name',
            'description',
            'price',
            'room_id'
        ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

}
