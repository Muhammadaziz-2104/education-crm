<?php

namespace App\Http\Responses;

use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class CourseResponse
{
    public static function make(Course $course): JsonResponse
    {
        return Response::json([
            'id' => $course['id'],
            'name' => $course['name'],
            'description' => $course['description'],
            'price' => $course['price'],
            'course-students'=> $course->student->count,
            'room_id' => $course['room_id'],
            'created_at' => $course['created_at'],
            'updated_at' => $course['updated_at'],
        ]);
    }
}
