<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousSearches extends Model
{
    use HasFactory;

    protected $fillable = [
        'words',
    ];

    public function scopeSearch($query, $search)
    {
        if (empty($search)) {
            return $query;
        }
            
    }
}
