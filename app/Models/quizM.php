<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizM extends Model
{
    use HasFactory;

    protected $table='quiz';
    protected $fillable = [
        'user_id','subject_id','title','description','created_by','updated_by'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subject()
    {
        return $this->hasOne('App\Models\SubjectM', 'id', 'subject_id');
    }
    public function quizAttend()
    {
        return $this->hasOne('App\Models\AttendQuizM', 'quiz_id', 'id');
    }
}
