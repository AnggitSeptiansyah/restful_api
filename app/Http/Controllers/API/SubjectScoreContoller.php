<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubjectScoreRequest;
use App\Models\SubjectScore;

class SubjectScoreContoller extends Controller
{

    public function create(SubjectScoreRequest $request)
    {
        $subjectScore = SubjectScore::create($request->validated());

        return response()->json([
            'message' => 'Berhasil ditambah',
            'subject_score' => $subjectScore
        ], 200);
    }

    public function show(SubjectScore $subjectScore)
    {
        $show = [
            'student_name' => $subjectScore->student->name,
            'subject' => $subjectScore->subject,
            'score' => $subjectScore->score
        ];

        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'subject_score' => $show
        ], 200);
    }

    public function update(SubjectScoreRequest $request, SubjectScore $subjectScore)
    {
        $updatedSubjectScore = $subjectScore->update($request->validated());

        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'subject_score' => $updatedSubjectScore
        ], 200);
    }

    public function destroy(SubjectScore $subjectScore)
    {
        $subjectScore->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
