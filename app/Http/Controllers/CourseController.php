<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Plan;
use App\Models\Transaksi;

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


    public function getAllCourseAdmin(Request $request)
    {
        $request->validate([
            'search' => 'nullable|max:255',
        ]);

        if ($request->search) {
            $courses = Course::with('sections', 'plan')->where('title', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->get();
            return view('admin.list-course', ['courses' => $courses, 'search' => $request->search]);
        } else {
            $courses = Course::with('sections', 'plan')->orderBy('updated_at', 'desc')->get();
            return view('admin.list-course', ['courses' => $courses]);
        }
    }

    function getAllCourseReader(Request $request)
    {
        $request->validate([
            'search' => 'nullable|max:255',
        ]);

        if ($request->search) {
            $courses = Course::with('sections', 'plan')->where('title', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->get();
            return view('reader.catalog', ['courses' => $courses, 'search' => $request->search]);
        } else {
            $courses = Course::with('sections', 'plan')->orderBy('updated_at', 'desc')->get();
            return view('reader.catalog', ['courses' => $courses]);
        }
    }

    public function courseDetailAdmin(int $id)
    {
        $course = Course::with('sections', 'plan')->find($id);

        return view('admin.course-detail', ['course' => $course]);
    }

    public function catalogIndex()
    {
        $courses = Course::with('sections', 'plan')
            ->get();

        return view('catalog', ['courses' => $courses]);
    }

    public function readerCatalogfilter(Request $request)
    {
        $price = $request->input('price');

        $courses = Course::when($price, function ($query, $price) {
            if (in_array('free', $price)) {
                $query->where('plan_id', 1);
            }

            if (in_array('paid', $price)) {
                $query->orWhere('plan_id', 2);
            }
        })->get();

        return view('reader.catalog', compact('courses'));
    }

    public function readerCatalogSort(Request $request)
    {
        $sort = $request->input('sort');

        $courses = Course::with('sections', 'plan')
            ->when($sort == 'recent', function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->when($sort == 'popular', function ($query) {
                $query->inRandomOrder();
            })
            ->get();

        return view('reader.catalog', ['courses' => $courses]);
    }
    public function adminCoursefilter(Request $request)
    {
        $price = $request->input('price');

        $courses = Course::when($price, function ($query, $price) {
            if (in_array('free', $price)) {
                $query->where('plan_id', 1);
            }

            if (in_array('paid', $price)) {
                $query->orWhere('plan_id', 2);
            }
        })->get();

        return view('admin.list-course', compact('courses'));
    }

    public function adminCourseSort(Request $request)
    {
        $sort = $request->input('sort');

        $courses = Course::with('sections', 'plan')
            ->when($sort == 'recent', function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->when($sort == 'popular', function ($query) {
                $query->inRandomOrder();
            })
            ->get();

        return view('admin.list-course', ['courses' => $courses]);
    }

    public function catalogFilter(Request $request)
    {
        $price = $request->input('price');

        $courses = Course::when($price, function ($query, $price) {
            if (in_array('free', $price)) {
                $query->where('plan_id', 1);
            }

            if (in_array('paid', $price)) {
                $query->orWhere('plan_id', 2);
            }
        })->get();

        return view('catalog', compact('courses'));
    }

    public function catalogSort(Request $request)
    {
        $sort = $request->input('sort');

        $courses = Course::with('sections', 'plan')
            ->when($sort == 'recent', function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->when($sort == 'popular', function ($query) {
                $query->inRandomOrder();
            })
            ->get();

        return view('catalog', ['courses' => $courses]);
    }

    public function courseDetailReader(int $id)
    {

        $course = Course::with('sections', 'plan')->find($id);
        $result = Transaksi::where('user_id', auth()->user()->id)
            ->where('status_id', 4)
            ->where('plan_id', $course->plan_id)
            ->first();

        if (!$result && $course->plan_id != 1) {
            return redirect()->route('reader.pricing')->with('error', 'You must buy a plan first');
        }

        return view('reader.course-detail', ['course' => $course]);
    }
}
