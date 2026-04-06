<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fashion;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name'
    ];

    public function fashion()
    {
        return $this->hasMany(Fashion::class);
    }
}
