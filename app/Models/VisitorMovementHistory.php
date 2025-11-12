<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitorMovementHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'purpose',
        'venues',
        'checked_in_at',
        'checked_out_at',
    ];

    protected $casts = [
        'venues' => 'array',
        'checked_in_at' => 'datetime',
        'checked_out_at' => 'datetime',
    ];

    // Relationship: Each movement belongs to a specific visitor
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    // Accessors for formatted datetime
    public function getCheckedInAtFormattedAttribute()
    {
        return optional($this->checked_in_at)->format('d M Y, h:i A');
    }

    public function getCheckedOutAtFormattedAttribute()
    {
        return optional($this->checked_out_at)->format('d M Y, h:i A');
    }

    public function getStatusAttribute()
    {
        if ($this->checked_out_at)
            return 'checked_out';
        if ($this->checked_in_at)
            return 'checked_in';
        return 'not_checked_in';
    }
}
