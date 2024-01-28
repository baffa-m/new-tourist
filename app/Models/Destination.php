<?php

namespace App\Models;

use App\Models\State;
use App\Models\Review;
use App\Models\Upload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'images',
        'category',
        'state_id'
    ];

    // Relationships
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function state():BelongsTo {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
