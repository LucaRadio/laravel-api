<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeProjectRequet;
use App\Http\Requests\updateProjectRequet;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate();
        return view("admin.project.home", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeList = Type::all();
        $technologyList = Technology::all();


        return view("admin.project.create", compact('typeList', 'technologyList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProjectRequet $request, Project $project)
    {
        $data = $request->validated();
        if (key_exists('img_cover', $data)) {
            $path = Storage::put('projects', $data['img_cover']);
        } else {
            $data['img_cover'] = "projects/noImg.jpg";
            $path = $data['img_cover'];
        };
        $project->create([
            ...$data,
            'img_cover' => $path

        ])->technologies()->sync($data['technologies'] ?? []);
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrfail($id);
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $typeList = Type::all();
        $technologyList = Technology::all();
        return view("admin.project.edit", compact("project", "typeList", "technologyList"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateProjectRequet $request, $id)
    {

        $data = $request->validated();
        $project = Project::findOrfail($id);
        if (key_exists('img_cover', $data)) {
            $path = Storage::put('projects', $data['img_cover']);
            Storage::delete($project->img_cover);
        };
        $project->update([
            ...$data,
            "img_cover" => $path ?? $project->img_cover
        ]);

        $project->technologies()->sync($data['technologies'] ?? []);


        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Project::all();

        $project = Project::findOrfail($id);

        foreach ($projects as $singleProject) {
            if (!$singleProject->img_cover === "projects/noImg.jpg") {
                Storage::delete($project->img_cover);
            } else {
            }
        }

        $project->technologies()->detach();

        $project->delete();
        return redirect()->route('projects.index');
    }
}
