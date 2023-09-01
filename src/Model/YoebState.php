<?php

namespace Yoeb\AddressInstaller\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yoeb\AddressInstaller\Model\YoebCountry;


class YoebState extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'country_id',
        'country_code',
        'country_name',
        'state_code',
        'type',
        'latitude',
        'longitude',
    ];

    function country_detail() {
        return $this->hasOne(YoebCountry::class, "id", "country_id");
    }
}
