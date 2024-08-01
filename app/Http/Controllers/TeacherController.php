<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCourseToTeacherRequest;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Teacher::all();
    }

    public function addCourseToTeacher(AddCourseToTeacherRequest $request, $teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        $courseId = $request->input('course_id');

        // Attach the course to the teacher
        $teacher->courses()->attach($courseId);

        return response()->json(['message' => 'Course added to teacher successfully'], 204);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);   }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacher = Teacher::with('courses', 'skill', 'room')->find($id);
        if (!$teacher) {
            return response()->json(['message' => 'Course not found'], 404);
        }
        return response()->json($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
         $teacher->update($request->all());
        return $teacher;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        if (!auth()->user()->hasRole(['admin', 'reception'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $teacher->delete();
        return response()->json(['message' => 'Teacher deleted successfully'],204);

    }
}
