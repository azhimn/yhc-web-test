<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    protected $fillable = [
        'title',
        'description',
        'embed_link',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
