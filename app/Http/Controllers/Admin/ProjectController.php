<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('admin.projects.index', ['projects' => $projects]);
    }

    public function show($id) {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', ['project' => $project]);
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            "title"=>["required","string","max:200"],
            "description"=>["required","string","max:255"],
            "image"=>["nullable","string"],
        ]);
        
        $project = Project::create($data); //fill e save
        return redirect()->route('admin.projects.show', $project->id);
    }
}
