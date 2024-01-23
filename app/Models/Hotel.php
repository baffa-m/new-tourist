<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'price_range',
        'image_path',
        'state_id'
    ];

    public function state():BelongsTo {
        return $this->belongsTo(State::class, 'state_id');
    }
}
