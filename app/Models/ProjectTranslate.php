<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslate extends Model
{
    use HasFactory;
    protected $fillable = ["project_id","title","slug","date","location","category","card_text","main_text","meta_description","lang","destroy"];
}
