<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreStudentRequest;
use App\Models\Student;

class StudentController extends Controller
{

    public function create(StoreStudentRequest $request)
    {

        $student = Student::create($request->validated());

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'student' => $student
        ], 200);
    }

    public function show(Student $student)
    {
        $student = Student::with('subject_scores')->find($student)->first();

        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'student' => $student
        ], 200);
    }

    public function update(StoreStudentRequest $request, Student $student)
    {
        $updatedStudent = $student->update($request->validated());

        return response()->json([
            'message' => 'Data berhasil diubah',
            'student' => $updatedStudent
        ], 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
