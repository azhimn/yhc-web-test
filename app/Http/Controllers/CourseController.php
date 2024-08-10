<?php

namespace App\Http\Controllers;

use HTMLPurifier;
use HTMLPurifier_Config;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('admin.course.show', compact('course'));
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|text|max:65535',
            'duration' => 'required|integer|max:1000',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $this->purifier->purify($request->description),
            'duration' => $request->duration,
        ]);

        return redirect()->route('courses.index')->with('success', 'Kursus "' . $course->title . '" berhasil dibuat!');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|text|max:65535',
            'duration' => 'required|integer|max:1000',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $this->purifier->purify($request->description),
            'duration' => $request->duration,
        ]);

        return redirect()->route('courses.index')->with('success', 'Kursus "' . $course->title . '" berhasil diperbarui!');
    }

    public function destroy(Course $course)
    {
        $title = $course->title;
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Kursus "' . $title . '" berhasil dihapus!');
    }

    protected $purifier;

    public function __construct()
    {
        $config = HTMLPurifier_Config::createDefault();
        $this->purifier = new HTMLPurifier($config);
    }

    public function purify($html)
    {
        return $this->purifier->purify($html);
    }
}
