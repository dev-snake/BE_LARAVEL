<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
class Project extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        "projectName",
        "listOfTechUsed",
        "startTime",
        "endTime",
        "projectDescription",
    ];
    // protected  function casts():array{
    //     return [
    //         "listTechUsed" => 'array',
    //     ];
    // }
    public $timestamps = true;

}
