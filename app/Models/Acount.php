<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lomkit\Rest\Relations\BelongsToMany;

class Acount extends Model
{
    /** @use HasFactory<\Database\Factories\AcountFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function necessaryEsxpenses(): HasMany
    {
        return $this->hasMany(NecessaryExpense::class);
    }

    public function levies(): HasMany
    {
        return $this->hasMany(Levy::class);
    }
}
