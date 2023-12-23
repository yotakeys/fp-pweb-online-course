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

        return redirect()->route('admin.course.form-add')->with('success', 'Course added successfully');
    }

    public function formEditCourse(int $id)
    {
        $course = Course::find($id);
        $plans = Plan::all();

        return view('admin.edit-course', ['course' => $course, 'plans' => $plans]);
    }

    public function editCourse(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'description' => 'required|min:8|max:255',
            'plan_id' => 'required',
        ]);

        $course = Course::find($id);
        $course->title = $request->title;
        $course->description = $request->description;
        $course->plan_id = $request->plan_id;
        $course->save();

        return redirect()->route('admin.course.detail', ['id' => $id])->with('success', 'Course updated successfully');
    }

    public function deleteCourse(int $id)
    {

        $course = Course::find($id);
        $course->delete();

        return redirect()->route('admin.course.list')->with('success', 'Course deleted successfully');
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

    public function courseDetail(int $id)
    {
        $course = Course::with('sections', 'plan')->find($id);

        return view('admin.course-detail', ['course' => $course]);
    }

    public function getCourseByPlanId(int $plan_id)
    {
        $courses = Course::where('plan_id', $plan_id)->get();

        return view('course.course-by-plan-id', ['courses' => $courses]);
    }
}
