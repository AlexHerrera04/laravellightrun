<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'name',
    ];

    public function tasques(): HasMany
    {
        return $this->hasMany(Tasca::class, 'categoria_id');
    }
}