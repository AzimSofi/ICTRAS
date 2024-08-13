<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class SuperUser extends Model
{
    use HasFactory;

    protected $table = 'super_user';
    protected $fillable = [
        'status'
    ];
}
