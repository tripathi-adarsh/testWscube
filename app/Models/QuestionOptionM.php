<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOptionM extends Model
{
    use HasFactory;
    protected $table='question_option';

    protected $fillable = [
        'question_id','option','correct','created_by','updated_by'
    ];

    protected $dates = ['deleted_at'];

}
