<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        "email",
        "phone",
        "facebook",
        "linkedin",
        "twitter",
        "instagram",
        "youtube",
        "whatsapp",
        "telegram",
        "author_url",
        "address_url",
    ];
    public function getTranslate(){
        return $this->hasMany(SettingTranslate::class, 'setting_id', 'id');
    }
}
