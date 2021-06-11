<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\ProjectUpdateRequest;
use App\Model\Projects;

class ProjectUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ProjectUpdateRequest $request, $id)
    {
        $project = Projects::find($id);
        if($project){
            $project->update($request->validated());
            return new ProjectResource($project);
        }

        return response()->json([
            'status' => false,
            'message' => 'No records found'
        ], 200);
    }
}
