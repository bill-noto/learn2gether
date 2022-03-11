<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "language_user";

    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
