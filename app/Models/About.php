<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = ['image_1', 'image_2', 'video_url', 'report_cover_1', 'report_cover_2'];
    public function getTranslate()
    {
        return $this->hasMany(AboutTranslate::class, 'about_id', 'id');
    }
}
