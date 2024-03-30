<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EndorsedCourse extends Model
{
    use HasFactory;

    protected $table = 'endorsed_courses';

    protected $fillable = [
        'university',
        'department_id',
        'course_code',
        'course_name',
        'endorsed_course_code',
        'endorsed_course_name',
        'status',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
