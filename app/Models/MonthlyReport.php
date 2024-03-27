<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyReport extends Model
{
    use HasFactory;
    protected $fillable = ['service_id','year','month','main_value','total_amount','destroy'];
    public function getService()
    {
        return $this->hasMany(ServiceTranslate::class, 'service_id', 'service_id');
    }
    public function getMonth()
    {
        return $this->hasMany(ReportMonthTranslate::class, 'month_id', 'month');
    }
}
