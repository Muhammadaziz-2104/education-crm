<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Education;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Student;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Education::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request)
    {
        $education = Education::create($request->all());
        return response()->json($education, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        $courseCount = Course::count();
        $studentCount = Student::count();

        $education->course_count = $courseCount;
        $education->student_count = $studentCount;

        return $education;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update($request->all());
        return $education;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $education = Education::find($id);

        if (!$education) {
            return response()->json(['message' => 'Education not found'], 404);
        }

        if (!auth()->user()->hasRole(['admin', 'reception'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $education->delete();
        return response()->json(['message' => 'Education deleted successfully'], 204);
    }
}
