<?php

namespace Yoeb\Address\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoebCountry extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'iso3',
        'iso2',
        'numeric_code',
        'phonecode',
        'capital',
        'currency',
        'currency_name',
        'currency_symbol',
        'tld',
        'native',
        'region',
        'subregion',
        'nationality',
        'timezones',
        'latitude',
        'longitude',
        'emoji',
        'emojiu',
        'wikiDataId',
    ];

}
