<?php

namespace App\Home\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * The user relationship for a home.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * A scope that gets scopes by the authenticated user.
     *
     * @param Builder $query
     * @return void
     */
    public function scopeDefaultUser(Builder $query): void
    {
        $query->where('user_id', Auth::id());
    }
}
