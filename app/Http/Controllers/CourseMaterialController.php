<?php

namespace App\Http\Controllers;

use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;

class CourseMaterialController extends Controller
{
    public function index()
    {
        $materials = CourseMaterial::all();
        return view('admin.material.index', compact('materials'));
    }

    public function show(CourseMaterial $material)
    {
        return view('admin.material.show', compact('material'));
    }

    public function create()
    {
        return view('admin.material.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|text|max:65535',
            'embed_link' => 'required|string|max:255',
            'course_id' => 'required|integer'
        ]);

        $material = CourseMaterial::create([
            'title' => $request->title,
            'description' => $this->purifier->purify($request->description),
            'embed_link' => $request->embed_link,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('materials.index')->with('success', 'Materi "' . $material->title . '" berhasil dibuat!');
    }

    public function edit(CourseMaterial $material)
    {
        return view('admin.materials.edit', compact('material'));
    }

    public function update(Request $request, CourseMaterial $material)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|text|max:65535',
            'embed_link' => 'required|string|max:255',
            'course_id' => 'required|integer'
        ]);

        $material->update([
            'title' => $request->title,
            'description' => $this->purifier->purify($request->description),
            'embed_link' => $request->embed_link,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('materials.index')->with('success', 'Materi "' . $material->title . '" berhasil diperbarui!');
    }

    public function destroy(CourseMaterial $material)
    {
        $title = $material->title;
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Materi "' . $title . '" berhasil dihapus!');
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
