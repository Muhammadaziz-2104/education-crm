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
 *     required={"id", "name", "description", "credits", "room_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Mathematics 101"),
 *     @OA\Property(property="description", type="string", example="Basic Mathematics course"),
 *     @OA\Property(property="credits", type="integer", example=300),
 *     @OA\Property(property="room_id", type="integer", example=2)
 * )
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
 * @OA\Schema(
 *       schema="Education",
 *       type="object",
 *       title="Education",
 *       required={"id", "name","phone","course_count", "student_count"},
 *                @OA\Property(property="id", type="integer", example=1),
 *                @OA\Property(property="name", type="string", example="Some Education"),
 *                @OA\Property(property="phone", type="string", example="Some Phone"),
 *                @OA\Property(property="student_count", type="integer", example=10),
 *                @OA\Property(property="course_count", type="integer", example=3),
 *                @OA\Property(property="student", type="array",
 *                    @OA\Items(
 *                        type="object",
 *                        @OA\Property(property="id", type="integer", example=1),
 *                        @OA\Property(property="name", type="string", example="Abbos"),
 *                        @OA\Property(property="email", type="string", example="user@gmail.com"),
 *                        @OA\Property(property="phone", type="string", example="911217628")
 *                    )
 *                ),
 *                @OA\Property(property="course",
 *                    type="array",
 *                    @OA\Items(
 *                        type="object",
 *                        @OA\Property(property="id", type="integer", example=1),
 *                        @OA\Property(property="name", type="string", example="Mathematics 101"),
 *                        @OA\Property(property="description", type="string", example="Basic Mathematics course"),
 *                        @OA\Property(property="price", type="integer", example=300),
 *                        @OA\Property(property="room_id", type="integer", example=2),
 *                    )
 *                ),
 *   )
 */


class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_education', 'education_id', 'course_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_education', 'education_id', 'student_id');
    }

}
