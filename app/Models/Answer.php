<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['question_id','answer','user_id'];

    
}
