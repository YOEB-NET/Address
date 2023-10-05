<?php

namespace Yoeb\AddressInstaller\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yoeb\AddressInstaller\Model\YoebAddress;

class YoebUserAddress extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'address_id',
        'user_id',
    ];

    function address_detail() {
        return $this->hasOne(YoebAddress::class, "id", "address_id");
    }

    function user_detail() {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
