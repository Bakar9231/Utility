<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'iso3',
        'iso2',
        'phonecode',
        'capital',
        'native',
        'emoji',
        'emojiU',
        'created_at',
        'updated_at',
        'flag',
        'wikiDataId',
    ];
    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function state()
    {
        return $this->hasMany(State::class);
    }
}
