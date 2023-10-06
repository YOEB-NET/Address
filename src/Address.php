<?php

// 05.10.2023 YOEB.NET X BERKAY.ME

namespace Yoeb\Address;

use Yoeb\Address\Model\YoebAddress;
use Yoeb\Address\Model\YoebUserAddress;
use Yoeb\Address\Model\YoebCountry;
use Yoeb\Address\Model\YoebState;
use Yoeb\Address\Model\YoebCity;

class Address{

    // Add
    protected static $title         = null;
    protected static $type          = null;
    protected static $country_id    = null;
    protected static $state_id      = null;
    protected static $city_id       = null;
    protected static $neighbourhood = null;
    protected static $building_no   = null;
    protected static $floor         = null;
    protected static $apartment     = null;
    protected static $detail        = null;
    protected static $directions    = null;
    protected static $latitude      = null;
    protected static $longitude     = null;
    protected static $paginate      = 0;
    protected static $filter        = null;
    protected static $userId        = null;
    protected static $addressId     = null;

    public static function title($title){
        self::$title = $title;
        return (new static);
    }

    public static function type($type){
        self::$type = $type;
        return (new static);
    }

    public static function countryId($country_id){
        self::$country_id = $country_id;
        return (new static);
    }

    public static function stateId($state_id){
        self::$state_id = $state_id;
        return (new static);
    }

    public static function cityId($city_id){
        self::$city_id = $city_id;
        return (new static);
    }

    public static function neighbourhood($neighbourhood){
        self::$neighbourhood = $neighbourhood;
        return (new static);
    }

    public static function building_no($building_no){
        self::$building_no = $building_no;
        return (new static);
    }

    public static function floor($floor){
        self::$floor = $floor;
        return (new static);
    }

    public static function apartment($apartment){
        self::$apartment = $apartment;
        return (new static);
    }

    public static function detail($detail){
        self::$detail = $detail;
        return (new static);
    }

    public static function directions($directions){
        self::$directions = $directions;
        return (new static);
    }

    public static function latitude($latitude){
        self::$latitude = $latitude;
        return (new static);
    }

    public static function longitude($longitude){
        self::$longitude = $longitude;
        return (new static);
    }

    public static function paginate($paginate = 10)
    {
        self::$paginate = $paginate;
        return (new static);
    }

    public static function filter($filter) {
        self::$filter = $filter;
        return (new static);
    }

    public static function userId($userId) {
        self::$userId = $userId;
        return (new static);
    }

    public static function addressId($addressId) {
        self::$addressId = $addressId;
        return (new static);
    }

    public static function add() {
        self::create([
            "title"         => self::$title,
            "type"          => self::$type,
            "country_id"    => self::$country_id,
            "state_id"      => self::$state_id,
            "city_id"       => self::$city_id,
            "neighbourhood" => self::$neighbourhood,
            "building_no"   => self::$building_no,
            "floor"         => self::$floor,
            "apartment"     => self::$apartment,
            "detail"        => self::$detail,
            "directions"    => self::$directions,
            "latitude"      => self::$latitude,
            "longitude"     => self::$longitude,
        ], self::$userId);
    }

    public static function create($data, $userId = null) {
        $res = YoebAddress::create($data);
        if(!empty($userId)){
            self::addUserAddress($res->id, $userId);
        }else{
            self::reset();
        }
        return $res;
    }

    public static function addUserAddress($addressId = null, $userId = null) {
        if(!empty($addressId)){
            self::addressId($addressId);
        }
        if(!empty($userId)){
            self::userId($userId);
        }

        $res = YoebUserAddress::create([
            "user_id"       => self::$userId,
            "address_id"    => self::$addressId,
        ]);

        self::reset();

        return $res;
    }

    public static function baseQuery() {
        $query = YoebAddress::query();

        if (!empty(self::$country_id)) {
            $query = $query->where("country_id", self::$country_id);
        }
        if (!empty(self::$state_id)) {
            $query = $query->where("state_id", self::$state_id);
        }
        if (!empty(self::$city_id)) {
            $query = $query->where("city_id", self::$city_id);
        }
        if (!empty(self::$neighbourhood)) {
            $query = $query->where("neighbourhood", self::$neighbourhood);
        }
        if (!empty(self::$building_no)) {
            $query = $query->where("building_no", self::$building_no);
        }
        if (!empty(self::$floor)) {
            $query = $query->where("floor", self::$floor);
        }
        if (!empty(self::$apartment)) {
            $query = $query->where("apartment", self::$apartment);
        }
        if (!empty(self::$detail)) {
            $query = $query->where("detail", self::$detail);
        }
        if (!empty(self::$directions)) {
            $query = $query->where("directions", self::$directions);
        }
        if (!empty(self::$latitude)) {
            $query = $query->where("latitude", self::$latitude);
        }
        if (!empty(self::$longitude)) {
            $query = $query->where("longitude", self::$longitude);
        }
        if(!empty(self::$userId)){
            $query = $query
            ->rightJoin('yoeb_user_addresses', 'yoeb_addresses.id', '=', 'yoeb_user_addresses.address_id')
            ->select((empty(self::$filter)) ? 'yoeb_addresses.*' : self::formatFilterColumns(self::$filter), 'yoeb_user_addresses.address_id as id') // 'id' olarak çıktıyı belirtiyoruz
            ->where('yoeb_addresses.deleted_at', null);
        }
        if (!empty(self::$addressId)) {
            $query = $query->where("id", self::$addressId);
        }
        return $query;
    }
    // List
    public static function list($query = null) {
        $list = self::baseQuery();
        if (is_callable($query)) {
            $query($list);
        }

        if(self::$paginate){
            if(empty(self::$filter)){
                $data = $list->paginate(self::$paginate);
            }else{
                $data = $list->paginate(self::$paginate, self::$filter);
            }
        }else{
            if(empty(self::$filter)){
                $data = $list->get();
            }else{
                $data = $list->get(self::$filter);
            }
        }

        self::reset();

        return $data;
    }

    // Delete
    public static function userAddresQuery() {
        $remove = YoebUserAddress::query();
        if(!empty(self::$userId)){
            $remove->where("user_id", self::$userId);
        }
        if(!empty(self::$addressId)){
            $remove->where("user_id", self::$addressId);
        }
        return $remove;
    }

    public static function remove($query = null){
        $remove = self::userAddresQuery();
        if (is_callable($query)) {
            $query($remove);
        }

        $remove->forceDelete();
        return $remove;
    }

    public static function softRemove($query = null){
        $remove = self::userAddresQuery();
        if (is_callable($query)) {
            $query($remove);
        }

        $remove->delete();
        return $remove;
    }

    public static function delete($query = null){
        $delete = self::baseQuery();
        if (is_callable($query)) {
            $query($delete);
        }

        $ids = $delete->pluck("id");
        self::remove();
        YoebAddress::whereIn("id", $ids)->forceDelete();
        return $delete;
    }

    public static function softDelete($query = null){
        $delete = self::baseQuery();
        if (is_callable($query)) {
            $query($delete);
        }

        self::softRemove();
        $delete->delete();
        return $delete;
    }

    public static function reset() {
        self::$title            = null;
        self::$country_id       = null;
        self::$state_id         = null;
        self::$city_id          = null;
        self::$neighbourhood    = null;
        self::$building_no      = null;
        self::$floor            = null;
        self::$apartment        = null;
        self::$detail           = null;
        self::$directions       = null;
        self::$latitude         = null;
        self::$longitude        = null;
        self::$userId           = null;
        self::$addressId        = null;
    }

    public static function formatFilterColumns($columns)
    {
        return array_map(function($column) {
            return "yoeb_addresses.$column";
        }, $columns);
    }

}

?>

