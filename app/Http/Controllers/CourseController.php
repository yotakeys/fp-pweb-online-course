<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Plan;

class CourseController extends Controller
{
    public function formAddCourse()
    {
        $plans = Plan::all();

        return view('course.course-add', ['plans' => $plans]);
    }

    public function addCourse(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'plan_id' => 'required',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'plan_id' => $request->plan_id,
        ]);
    }

    public function getAllCourse()
    {
        $courses = Course::all();

        return view('course.course-all', ['courses' => $courses]);
    }

    public function getCourseByPlanId(int $plan_id)
    {
        $courses = Course::where('plan_id', $plan_id)->get();

        return view('course.course-by-plan-id', ['courses' => $courses]);
    }
}
