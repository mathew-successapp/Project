<?php

namespace App\Http\Controllers;

use App\Model\Projects;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::all();

        if($projects){
            return ProjectResource::collection($projects);
        }
        return response()->json([
            'status' => false,
            'message' => 'No records found'
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, $id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
