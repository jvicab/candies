<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandyBar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'name',
        'rating',
    ];

    /** relationships */

    public function user()
    {
        return $this->belongsTo(User::class,);
    }

}
