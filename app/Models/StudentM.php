<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentM extends Model
{
    use HasFactory;

    protected $table='students';
    protected $fillable = [
        'user_id','subject_id','name','email','description','created_by','updated_by'
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
}
