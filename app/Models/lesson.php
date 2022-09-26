<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
     protected $table = 'lessons';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Course one to one relationships
    public function course()
    {
        $this->belongsTo(Course::class);
    }
}
