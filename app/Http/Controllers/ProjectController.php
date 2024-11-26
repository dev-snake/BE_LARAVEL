<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $project = Project::get();
        return response()->json([
        "results"=> $project,
        "message"=> 'Get all projects successfully !',
        "status" => 'success'
       ] , 200);
    }
    public function getOne(string $projectId){
        $getProject = Project::find( $projectId);
        if(!$getProject){
            return response('Not Found !' , 404);
        };
        return response()->json([
            'results'=> $getProject,
            "message" => 'Get one project successfully !',
            "status" => 'success'

            
        ] , 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'projectName' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response( $validator-> errors());
        }
        $project = Project::create( $request->all());
    
        return response()->json([
            "data"=> $project,
            "message" => "Created product successfully !",
            "status"=> "success"
        ], 201);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $projectId , Request $request)
    {
        $project = Project::where('_id', $projectId)->first();

        if (!$project) {
            return response()->json([
                'message' => 'Project not found!',
                'status' => 'error'
            ], 404);
        }
        
        $project->update($request->all());
        
        return response()->json([
            'results' => $project,
            'message' => 'Updated successfully!',
            'status' => 'success'
        ], 200);
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $projectId)
    {
     
        $project = Project::where('_id' , $projectId)->delete();
        if(!$project){
            return response()->json([
                "message"=> 'Error'
            ],500);
        }
        return response()->json([
            'message'=> 'Deleted successfully !',
            'status'=> 'success'
        ],200);
    }
}
