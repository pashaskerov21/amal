<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['volunteer_id', 'title', 'subtitle', 'lang'];
}
