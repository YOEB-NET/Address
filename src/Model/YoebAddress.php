<?php

namespace Yoeb\Address\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yoeb\Address\Model\YoebCountry;
use Yoeb\Address\Model\YoebState;
use Yoeb\Address\Model\YoebCity;

class YoebAddress extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'title',
        'country_id',
        'state_id',
        'city_id',
        'neighbourhood',
        'building_no',
        'floor',
        'apartment',
        'detail',
        'directions',
        'latitude',
        'longitude',
    ];

    function country_detail() {
        return $this->hasOne(YoebCountry::class, "id", "country_id");
    }

    function state_detail() {
        return $this->hasOne(YoebState::class, "id", "state_id");
    }

    function city_detail() {
        return $this->hasOne(YoebCity::class, "id", "city_id");
    }

    function user_addresses_detail() {
        return $this->hasMany(YoebUserAddress::class, "address_id", "id");
    }

    function user_address_detail() {
        return $this->hasOne(YoebUserAddress::class, "address_id", "id");
    }

}
