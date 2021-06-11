<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Resources\ProjectResource;
use App\Model\Projects;

class ProjectStoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ProjectStoreRequest $request)
    {
        $project = new Projects();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->due_date = $request->due_date;
        $project->status = $request->status;

        if($project->save()){
            return new ProjectResource($project);
        }
        return response()->json([
            'status' => false,
            'message' => 'Project save Failed'
        ], 422);
    }
}
