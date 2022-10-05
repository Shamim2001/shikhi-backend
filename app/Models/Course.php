<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
     protected $table = 'courses';
    protected $guarded = ['id', 'created_at', 'updated_at'];


    // User Relation one to ne Relationship
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }


    // Category one to one Relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    // Change default Route name
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
