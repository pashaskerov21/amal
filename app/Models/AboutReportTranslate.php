<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutReportTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['report_id', 'title', 'lang'];
}
