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

    public function formAddSection(int $courseId)
    {
        return view('admin.add-section', ['courseId' => $courseId]);
    }

    public function addSection(Request $request, int $courseId)
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

        return redirect()->route('admin.course.detail', ['id' => $courseId])->with('success', 'Section added successfully');
    }

    public function formEditSection(int $courseId, int $sectionId)
    {
        $section = Section::find($sectionId);

        return view('admin.edit-section', ['section' => $section, 'courseId' => $courseId]);
    }

    public function editSection(Request $request, int $courseId, int $sectionId)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'course_id' => 'required',
        ]);

        $section = Section::find($sectionId);
        $section->title = $request->title;
        $section->text = $request->text;
        $section->course_id = $request->course_id;
        $section->save();

        return redirect()->route('admin.section.detail', ['course_id' => $courseId, 'section_id' => $sectionId])->with('success', 'Section updated successfully');
    }

    public function deleteSection(int $courseId, int $sectionId)
    {
        $section = Section::find($sectionId);
        $section->delete();

        return redirect()->route('admin.course.detail', ['id' => $courseId])->with('success', 'Section deleted successfully');
    }

    public function sectionDetailAdmin(int $courseId, int $sectionId)
    {
        $section = Section::find($sectionId);

        return view('admin.section-detail', ['section' => $section, 'courseId' => $courseId]);
    }

    public function sectionDetailReader(int $courseId, int $sectionId)
    {
        $section = Section::find($sectionId);

        return view('reader.section-detail', ['section' => $section, 'courseId' => $courseId]);
    }
}
