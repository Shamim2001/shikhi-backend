<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
     protected $table = 'courses';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['teacher', 'lessons'];


    // User Relation one to ne Relationship
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    // Category one to one Relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }

    // Review one to many relationship
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    // Change default Route name
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
