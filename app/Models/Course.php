<?php

namespace App\Models;

use App\Models\CourseMaterial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
    ];

    public function materials()
    {
        return $this->hasMany(CourseMaterial::class);
    }
}
