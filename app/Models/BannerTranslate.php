<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['banner_id', 'title', 'text', 'lang'];
}
