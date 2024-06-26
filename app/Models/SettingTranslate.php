<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTranslate extends Model
{
    use HasFactory;
    protected $fillable = [
        "setting_id",
        "lang",
        "title",
        "description",
        "author",
        "keywords",
        "copyright",
        "address_text",
    ];
}
