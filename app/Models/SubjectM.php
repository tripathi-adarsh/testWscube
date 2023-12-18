<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectM extends Model
{
    use HasFactory;
    protected $table='subjects';
    protected $fillable = [
        'user_id','name','description','created_by','updated_by'
    ];
     protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
