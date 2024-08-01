<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddStudentToCourseRequest;
use App\Http\Responses\CourseResponse;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\JsonResponse;


class CourseController extends Controller
{
    public function index()
    {
        return Course::all();
    }

    public function addToCourse(AddStudentToCourseRequest $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        $studentId = $request->input('student_id');

        // Attach the student to the course
        $course->students()->attach($studentId);

        return response()->json(['message' => 'Student added to course successfully:Qo\'shildi'], 200);
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    public function show($id)
    {
        $course = Course::with('students')->find($id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }
        return response()->json($course);
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());
        return response()->json($course, 200);
    }

    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        if (!auth()->user()->hasRole(['admin', 'reception'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $course->delete();
        return response()->json(['message' => 'Course deleted successfully'],204);
    }
}
