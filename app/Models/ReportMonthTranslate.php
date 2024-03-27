<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportMonthTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['month_id', 'lang', 'title'];
}
