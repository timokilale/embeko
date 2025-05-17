<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeForm extends Model
{
    use HasFactory;

    protected $fillable = ['fee_id', 'form_id', 'year_id','fee_category_id'];

    protected $table = 'category_fee_forms';

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
