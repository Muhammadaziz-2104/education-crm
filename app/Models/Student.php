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
 *     @OA\Property(property="phone", type="string", example="911217628"),
 *     @OA\Property(
 *         property="courses",
 *         type="array",
 *         @OA\Items(
 *             type="object",
 *               @OA\Property(property="name", type="string", example="Mathematics 101"),
 *               @OA\Property(property="description", type="string", example="Basic Mathematics course"),
 *               @OA\Property(property="credits", type="integer", example=300),
 *               @OA\Property(property="room_id", type="integer", example=2)
 *         )
 *     )
 * )
 */

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'phone', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }


}
