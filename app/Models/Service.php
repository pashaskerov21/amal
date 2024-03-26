<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'order', 'destroy'];
    public function getTranslate()
    {
        return $this->hasMany(ServiceTranslate::class, 'service_id', 'id');
    }
}
