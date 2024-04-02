<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'details', 'category_id', 'project_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }

}
