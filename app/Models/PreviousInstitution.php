<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PreviousInstitution extends Model
{
    use HasFactory;

    protected $table = 'previous_institutions';
    protected $fillable = [
        // 'matric_no',
        'name',
        'degree_status',
        'degree_or_diploma_name',
        'year_of_study',
        'reason_of_leaving',
        'cgpa',

        'pdf_name',
        'pdf_content',
    ];
}
