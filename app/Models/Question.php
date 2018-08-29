<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
    	'question_name', 'duration', 'duration_type', 'resumable', 'created_at', 'updated_at'
    ];
}
