<?php

namespace App\Models;

use App\Enums\Paste\AccessType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Paste model
 *
 * @property string $paste
 * @property AccessType $access_type
 * @property int $user_id
 * @property string $syntax
 * @property string hash
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $expired_at
 *
 * @mixin Builder
 */
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

    protected $casts = [
        'access_type' => AccessType::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
