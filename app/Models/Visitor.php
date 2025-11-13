<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'photo',
        'badge_no',
        'created_by',
        'gender',
        "aadhaar",
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationship: One visitor can have multiple movement history records
    public function movementHistories()
    {
        return $this->hasMany(VisitorMovementHistory::class);
    }
}
