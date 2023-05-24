<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    public function dashboard(){

        return view('admin.dashboard');
    }

    public function index()
    {
        $projects = Project::all();

      return view('admin.index',compact('projects'));

    }


    public function create()
    {
       $types=Type::all();
       return view('admin.create',compact('types'));
    }


    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $newProject = new Project();
        $data['slug'] = Str::slug($request->title,'-');

        $newProject->fill($data);

        $newProject->save();

        return redirect()->route('admin.projects.show',['project'=>$newProject->id]);
    }


    public function show(Project $project)
    {

        return view('admin.show', compact('project'));
    }


    public function edit(Project $project)
    {
        return view('admin.edit',compact('project'));
    }


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->update($data);

        return redirect()->route('admin.projects.show',['project'=>$project->id]);
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
