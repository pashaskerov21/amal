<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['about_id', 'lang', 'home_title', 'home_text', 'report_title', 'report_text','how_we_work_text'];
}
