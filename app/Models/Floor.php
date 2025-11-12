<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_id',
        'building_id',
        'floor_name',
        'status',
    ];

    // Relationship: A floor belongs to a building
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    // Auto generate floor code FLR001, FLR002...
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($floor) {
            $last = self::orderBy('id', 'desc')->first();
            $number = $last ? ((int) substr($last->floor_id, 3)) + 1 : 1;
            $floor->floor_id = 'FLR' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });
    }
}
