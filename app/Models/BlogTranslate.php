<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTranslate extends Model
{
    use HasFactory;
    protected $fillable = ["blog_id","title","slug","date","text", "meta_description","lang","destroy"];
}
