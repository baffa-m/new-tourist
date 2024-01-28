<?php

namespace App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'image_path'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
