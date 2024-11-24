<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        "projectName",
        "listofTechnoglogiesUsed",
        "startTime",
        "endTime",
        "projectDescription",
        "projectImage"
    ];
    protected $casts = [
        'listofTechnoglogiesUsed' => 'array', 
    ];
    public $timesstamps = true;
}
