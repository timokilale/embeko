<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slogan',
        'logo',
        'email',
        'phone',
        'address',
        'about',
        'mission',
        'vision',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'linkedin',
    ];

    /**
     * Get the school information.
     *
     * @return \App\Models\SchoolInfo
     */
    public static function getInfo()
    {
        $info = self::first();

        if (!$info) {
            $info = self::create([
                'name' => 'Embeko Secondary School',
                'slogan' => 'Education with excellency',
            ]);
        }

        return $info;
    }
}
