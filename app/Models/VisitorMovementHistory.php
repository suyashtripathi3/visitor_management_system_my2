<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitorMovementHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'user_id',
        'meeting_date',
        'meeting_time',
        'purpose',
        'person_req',
    ];

    protected $casts = [
        'meeting_date' => 'date',
        'meeting_time' => 'datetime:H:i:s',
    ];


    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meetingDetails()
    {
        return $this->hasMany(VisitorMeetingDetails::class, 'movement_id');
    }

    public function withVisitors()
    {
        return $this->hasMany(WithVisitor::class, 'movement_id');
    }
}
