<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $with = [
        'users'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
