<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('index', ['dati' => $projects]);
    }

    public function show($id) {
        $project = Project::findOrFail($id);
        return view('show', ['project' => $project]);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        //////con il validate
        $data = $request->validate([
            "title"=>["required","string","max:200"],
            "description"=>["required","string","max:255"],
            "image"=>["nullable","string"],
        ]);
        
        $project = Project::create($data); //fill e save
        return redirect()->route('admin.projects.show', $project->id);
    }
}
