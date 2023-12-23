<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function getSectionByCourseId(int $courseId)
    {
        $sections = Section::where('course_id', $courseId)->get();

        return view('section.section-by-course-id', ['sections' => $sections]);
    }

    public function formAddSectionByCourseId(int $courseId)
    {
        return view('section.section-add-by-course-id', ['courseId' => $courseId]);
    }

    public function addSectionByCourseId(Request $request, int $courseId)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'course_id' => 'required',
        ]);

        Section::create([
            'title' => $request->title,
            'text' => $request->text,
            'course_id' => $request->course_id,
        ]);
    }
}
