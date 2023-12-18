<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionM extends Model
{
    use HasFactory;
    protected $table='question';
    protected $fillable = [
        'user_id','subject_id','quiz_id','title','created_by','updated_by'
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
    public function questionOption()
    {
        return $this->hasMany('App\Models\QuestionOptionM', 'question_id', 'id');
    }
    
}
