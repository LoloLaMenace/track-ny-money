<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NecessaryExpense extends Model
{
    /** @use HasFactory<\Database\Factories\NecessaryExpenseFactory> */
    use HasFactory;

    public function acount(): BelongsTo
    {
        return $this->belongsTo(Acount::class);
    }
}
