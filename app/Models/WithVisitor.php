<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithVisitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'movement_id',
        'in_with',
        'out_with',
    ];

    public function movement()
    {
        return $this->belongsTo(VisitorMovementHistory::class, 'movement_id');
    }
}
