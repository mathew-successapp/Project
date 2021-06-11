<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Model\Projects;

class ProjectShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $project = Projects::where('id',$id)->first();
        if($project){
            return new ProjectResource($project);
        }
        return response()->json([
            'status' => false,
            'message' => 'No records found'
        ], 200);
    }
}
