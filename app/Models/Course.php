<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
     protected $table = 'courses';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    // Change default Route name
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
