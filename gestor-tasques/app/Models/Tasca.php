<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tasca extends Model
{
    protected $table = 'tasques';

    protected $fillable = [
        'title',
        'description',
        'completed',
        'categoria_id',
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}