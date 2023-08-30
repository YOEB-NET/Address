<?php

namespace Yoeb\AddressInstaller\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
