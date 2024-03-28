<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ["status","current_amount","final_amount",'percent',"card_image","banner_image","order","destroy"];
    public function getTranslate()
    {
        return $this->hasMany(ProjectTranslate::class, 'project_id', 'id');
    }
    public function getGallery()
    {
        return $this->hasMany(ProjectGallery::class, 'project_id', 'id')->where('destroy',0)->orderBy('order');
    }
}
