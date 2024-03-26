<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['page', 'image', 'order', 'destroy'];
    public function getTranslate()
    {
        return $this->hasMany(BannerTranslate::class, 'banner_id', 'id');
    }
    public function getPage(){
        return $this->hasMany(MenuTranslate::class, 'menu_id', 'page');
    }
}
