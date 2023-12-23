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

        return view('admin.add-course', ['plans' => $plans]);
    }

    public function addCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'description' => 'required|min:8|max:255',
            'plan_id' => 'required',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'plan_id' => $request->plan_id,
        ]);

        return redirect()->route('admin.course.form')->with('success', 'Course added successfully');
    }

    public function getAllCourse()
    {
        $courses = Course::all();

        return view('course.course-all', ['courses' => $courses]);
    }

    public function getAllCourseAdmin()
    {
        $courses = Course::with('sections', 'plan')->orderBy('updated_at', 'desc')->get();

        return view('admin.list-course', ['courses' => $courses]);
    }

    public function getCourseByPlanId(int $plan_id)
    {
        $courses = Course::where('plan_id', $plan_id)->get();

        return view('course.course-by-plan-id', ['courses' => $courses]);
    }
}
