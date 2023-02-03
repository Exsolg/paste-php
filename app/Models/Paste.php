<?php

namespace App\Models;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paste extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'paste',
        'access_type',
        'user_id',
        'syntax',
        'created_at',
        'updated_at',
        'expired_at',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
