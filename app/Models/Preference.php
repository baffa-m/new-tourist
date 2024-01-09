<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'historic',
        'shopping',
        'nature_wildlife',
        'parks',
        'sports',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
