<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Events\Login;

class Userlog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ip_address', 'login_at'];

    public function handle(Login $event)
    {
        Userlog::create([
            'user_id' => $event->user->id,
            'ip_address' => request()->ip(),
            'login_at' => now(),
        ]);
    }
}
