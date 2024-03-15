<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'user',
        'course_code',
        'course_name',
        'credit_hours',
        'grade_obtained',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'matric_no');
    }
}
