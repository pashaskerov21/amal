<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutReport extends Model
{
    use HasFactory;
    protected $fillable = ['value', 'order', 'destroy'];
    public function getTranslate()
    {
        return $this->hasMany(AboutReportTranslate::class, 'report_id', 'id');
    }
}
