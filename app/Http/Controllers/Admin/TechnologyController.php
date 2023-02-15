<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologyList = Technology::all();
        return view("/", compact('technologyList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.technology.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Technology $technology)
    {

        $data = $request->validate([
            "name" => "required|max:255"
        ]);
        $technology->create($data);
        return redirect("/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $technology = Technology::findOrfail($id);
        return view('admin.technology.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technology = Technology::findOrFail($id);
        return view("admin.technology.edit", compact("technology"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                "name" => "required|max:255"
            ]
        );
        $technology = Technology::findOrfail($id);
        $technology->update($data);
        return redirect("/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $technology = Technology::findOrfail($id);
        $projects = Project::all();

        if ($request->deleting) {
            foreach ($projects as $project) {
                $project->technologies()->detach();
                $project->save();
            };
        }



        $technology->delete();
        return redirect("/dashboard");
    }
}
