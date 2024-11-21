<?php

namespace Yoeb\Address\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yoeb\Address\Model\YoebCountry;
use Yoeb\Address\Model\YoebState;

class YoebCity extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'slug',
        'name',
        'state_id',
        'state_code',
        'state_name',
        'country_id',
        'country_code',
        'country_name',
        'latitude',
        'longitude',
        'wikidataid',
    ];

    function country_detail() {
        return $this->hasOne(YoebCountry::class, "id", "country_id");
    }

    function state_detail() {
        return $this->hasOne(YoebState::class, "id", "state_id");
    }

}
