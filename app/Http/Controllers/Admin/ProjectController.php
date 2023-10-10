<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('admin.projects.index', ['projects' => $projects]);
    }

    public function show($slug) {
        $project = Project::where("slug", $slug)->first();
        return view('admin.projects.show', ['project' => $project]);
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            "title"=>["required","string","max:100"],
            "description"=>["required","string","max:255"],
            "image"=>["nullable","string"],
        ]);

        //funzione dello slug
        $contatore = 0;
        do {
            $slug = Str::slug($data["title"]) . ($contatore > 0 ? "-" . $contatore : ""); //creo slug e se contatore >0 allora concateno 
            $esiste = Project::where("slug", $slug)->first(); //creo se esiste
            $contatore++; 
        } while ($esiste);
        $data["slug"] = $slug;

        
        $project = Project::create($data); //fill e save
        return redirect()->route('admin.projects.show', $project->slug);
    }
}
