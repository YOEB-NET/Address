<?php

namespace Yoeb\AddressInstaller\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YoebUserAddress extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'address_id',
        'user_id',
    ];


}
