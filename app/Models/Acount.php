<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acount extends Model
{
    /** @use HasFactory<\Database\Factories\AcountFactory> */
    use HasFactory;

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
}
