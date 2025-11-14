<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'visitor_type',
        'email',
        'phone',
        'company',
        'photo',
        'badge_no',
        'gender',
        'aadhaar',
        'created_by',
    ];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function movementHistories()
    {
        return $this->hasMany(VisitorMovementHistory::class);
    }
}
