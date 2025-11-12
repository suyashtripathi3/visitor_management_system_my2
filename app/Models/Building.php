<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LogHistory;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'name',
        'address',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->building_id)) {
                $maxId = self::selectRaw("MAX(CAST(SUBSTRING(building_id, 4) AS UNSIGNED)) as max_id")
                            ->value('max_id');

                $nextId = $maxId ? $maxId + 1 : 1;
                $model->building_id = 'BLD' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
            }
        });
    }

}
