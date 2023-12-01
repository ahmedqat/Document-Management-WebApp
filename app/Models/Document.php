<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [

        'department_id',
        'title',
        'description',
        'path',
        'file_name',


    ];

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
