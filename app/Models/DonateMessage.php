<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateMessage extends Model
{
    use HasFactory;
    protected $fillable = ['service_id','fullname','phone','email','amount','note'];
    public function getService()
    {
        return $this->hasMany(ServiceTranslate::class, 'service_id', 'service_id');
    }
}
