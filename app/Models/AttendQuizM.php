<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendQuizM extends Model
{
    use HasFactory;
    protected $table='attend_quiz';
    protected $fillable = [
        'student_id','question_id','quiz_id','answer','score','created_by','updated_by'
    ];

    protected $dates = ['deleted_at'];

    public function quiz()
    {
        return $this->hasOne('App\Models\quizM', 'id', 'quiz_id');
    }
}
