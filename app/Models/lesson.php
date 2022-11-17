<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
     protected $table = 'lessons';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with  = [];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    // Course one to one relationships
    public function coursess()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
