<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Trend extends Model
{
    protected $table = 'trends';

    protected $fillable = [
        'title',
        'slug',
        'order',
        'status',
    ];


    public function scopeAsc($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function sopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
