<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRatio extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $table = "user_ratio";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
