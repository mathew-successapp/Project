<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;
use App\Model\Projects;

class ProjectDestroyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $project = Projects::find($id); 
        
        if($project){
            $project->delete();
            return response()->json([
                'status' => true,
                'message' => 'Record deleted successfully'
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'No record found'
        ], 200);
    }
}
