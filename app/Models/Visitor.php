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
        'purpose',
        'photo',
        'badge_no',
        'photo',
        'created_by',
        'gender',
        'venues',
    ];

    protected $casts = [
        'venues' => 'array',
        'checked_in_at' => 'datetime',
        'checked_out_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getStatusAttribute()
    {
        if ($this->checked_out_at) return 'checked_out';
        if ($this->checked_in_at) return 'checked_in';
        return 'not_checked_in';
    }

    public function getCheckedInAtFormattedAttribute()
    {
        return optional($this->checked_in_at)->format('d M Y, h:i A');
    }

    public function getCheckedOutAtFormattedAttribute()
    {
        return optional($this->checked_out_at)->format('d M Y, h:i A');
    }
}
