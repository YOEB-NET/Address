<?php

namespace Yoeb\AddressInstaller\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yoeb\AddressInstaller\Model\YoebCountry;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    
}
