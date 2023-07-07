<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $validations = [
        'name'          => 'required|string|min:5|max:50',
        'client_name'   => 'required|string|min:3|max:30',
        'date'          => 'required|date', 
        'cover_image'   => 'required|url|max:200', 
        'summary'       => 'required|string',
    ];

    private $validations_messages = [
        'required'      => 'Il campo :attribute è obbligatorio',
        'min'           => 'Il campo :attribute deve contenere almeno :min caratteri',
        'max'           => 'Il campo :attribute deve contenere almeno :max caratteri',
        'url'           => 'Il campo deve essere un url valido',
        'date'          => 'Il campo :attribute deve essere in formato yyyy/mm/dd',
    ]; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(5);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validations_messages);

        $data = $request->all();

        $newProject = new Project();
        $newProject->name           = $data['name'];
        $newProject->client_name    = $data['client_name'];
        $newProject->date           = $data['date'];
        $newProject->cover_image    = $data['cover_image'];
        $newProject->summary        = $data['summary'];
        $newProject->save();

        return to_route('admin.projects.show', ['project' => $newProject]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate($this->validations, $this->validations_messages);

        $data = $request->all();

        $project->name           = $data['name'];
        $project->client_name    = $data['client_name'];
        $project->date           = $data['date'];
        $project->cover_image    = $data['cover_image'];
        $project->summary        = $data['summary'];
        $project->update();

        return to_route('admin.projects.show', ['project' => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('delete_success', $project);
    }
}
