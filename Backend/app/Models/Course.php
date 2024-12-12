<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'levels',
        'schedule',
        'max_class_size',
        'avg_class_size',
        'duration',
        'start_date',
        'course_type_id',
    ];

    public function course_type()
    {
        return $this->belongsTo(CourseType::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
