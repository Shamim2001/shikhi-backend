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
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }


    // Category one to one Relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    // Accessor
    public function getThumbnailAttribute( $name ) {
        if ( str_starts_with( $name, 'http' ) ) {
            return $name;
        } else {
            return asset( 'storage/uploads/courses/' . $name );
        }
    }


    // Change default Route name
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
