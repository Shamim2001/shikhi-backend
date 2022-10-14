<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
     protected $table = 'reviews';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // student one to many relationship
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    // course one to many relationship
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
