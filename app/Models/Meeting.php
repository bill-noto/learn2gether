<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function host()
    {
        return $this->belongsTo(User::class, 'user_id', 'host_id');
    }

    public function patron()
    {
        return $this->belongsTo(User::class, 'user_id', 'patron_id');
    }
}
