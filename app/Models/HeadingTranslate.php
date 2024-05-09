<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadingTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['heading_id', 'title', 'subtitle', 'lang'];
}
