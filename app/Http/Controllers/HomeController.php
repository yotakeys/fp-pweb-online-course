<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::inRandomOrder()->take(4)
            ->with('sections', 'plan')
            ->get();

        return view('homepage', ['courses' => $courses]);
    }
}
