<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'phone_number'];

    public function subject_scores()
    {
        return $this->hasMany(SubjectScore::class);
    }
}
