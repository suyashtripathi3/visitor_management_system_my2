<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitorMeetingDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'movement_id',
        'user_id',
        'purpose',
        'venues',
        'meeting_date',
        'meeting_time',
    ];

    protected $casts = [
        'venues' => 'array',
        'meeting_date' => 'date',
        'meeting_time' => 'datetime',
    ];

    // Relationship: belongs to visitor
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    // Relationship: belongs to movement history
    public function movement()
    {
        return $this->belongsTo(VisitorMovementHistory::class, 'movement_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
