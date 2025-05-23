<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function fees()
    {
        return $this->belongsToMany(Fee::class);
    }
}
