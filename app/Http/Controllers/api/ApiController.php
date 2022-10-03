<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function courses()
    {
        return [
            'error' => 'false',
            'courses' => Course::get(),
        ];
    }
}
