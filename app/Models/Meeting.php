<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'date_time_of_meeting' => 'date'
    ];

    protected $with = ['host', 'patron'];

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id', 'id');
    }

    public function patron()
    {
        return $this->belongsTo(User::class, 'patron_id', 'id');
    }
}
