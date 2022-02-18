<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

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
}
