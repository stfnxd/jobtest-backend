<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Projects', [
            'projects' => Project::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        // Loads comments from the project instead of all comments in DB and then filtering them
        $project->load('comments');

        return inertia('Project', [
            'project' => $project,
        ]);
    }

}
