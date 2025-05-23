<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'description',
        'category',
        'name',
        'due_date'
    ];

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
