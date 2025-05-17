<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function fees()
    {
        return $this-> belongsToMany(Fee::class,'category_fee_forms','form_id','fee_id')->withPivot('year_id');
    }

    public function paymentSchedules()
    {
        return $this->hasMany(PaymentSchedule::class);
    }
}
