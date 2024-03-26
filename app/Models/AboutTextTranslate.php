<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTextTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['text_id', 'title', 'text', 'lang'];
}
