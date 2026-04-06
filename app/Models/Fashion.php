<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Fashion extends Model
{
    use HasFactory;
    protected $table = 'fashion';

    protected $fillable = [
        'code',
        'name',
        'desc',
        'slug',
        'price_per_day',
        'category_id',
        'image',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
