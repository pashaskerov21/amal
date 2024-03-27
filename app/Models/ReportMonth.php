<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportMonth extends Model
{
    use HasFactory;
    protected $fillable = ['destroy'];
    public function getTranslate()
    {
        return $this->hasMany(ReportMonthTranslate::class, 'month_id', 'id');
    }
}
