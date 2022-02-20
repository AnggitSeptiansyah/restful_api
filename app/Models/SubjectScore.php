<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectScore extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'subject', 'score'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
