<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {


        if ($request->input('last6')) {
            $projects = Project::orderBy('created_at', 'DESC')->limit(6)->get();
        } else {
            $projects = Project::paginate(16);
        };
        return response()->json($projects);
    }

    public function show(Project $project)
    {
        $project->load('type', 'technologies');
        return response()->json($project);
    }
}
