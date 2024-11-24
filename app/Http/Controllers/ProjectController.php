<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
       return response('ok', 200);
    }
    public function getOne(){
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = Project::create([
        "projectName"=> 'Ahihi',
        "listofTechnoglogiesUsed" => ['js' , 'php'],
        "startTime" => '1',
        "endTime" => '1',
        "projectDescription" => '1',
        "projectImage"=> '1'
        ]);
        return response('Created Project successfully !' , 200);
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
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
