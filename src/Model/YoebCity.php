<?php

namespace Yoeb\AddressInstaller\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yoeb\AddressInstaller\Model\YoebCountry;
use Yoeb\AddressInstaller\Model\YoebState;

class YoebCity extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'state_id',
        'state_code',
        'state_name',
        'country_id',
        'country_code',
        'country_name',
        'latitude',
        'longitude',
        'wikiDataId',
    ];

    function country_detail() {
        return $this->hasOne(YoebCountry::class, "id", "country_id");
    }

    function state_detail() {
        return $this->hasOne(YoebState::class, "id", "state_id");
    }

}
