<?php

// 15.07.2023 YOEB.NET X BERKAY.ME

namespace Yoeb\AddressInstaller;

use Yoeb\AddressInstaller\Model\YoebAddress;
use Yoeb\AddressInstaller\Model\YoebCountry;
use Yoeb\AddressInstaller\Model\YoebState;
use Yoeb\AddressInstaller\Model\YoebCity;
class Address{

    // Add
    protected static $title = null;
    protected static $country_id = null;
    protected static $state_id = null;
    protected static $city_id = null;
    protected static $neighbourhood = null;
    protected static $building_no = null;
    protected static $floor = null;
    protected static $apartment = null;
    protected static $detail = null;
    protected static $directions = null;
    protected static $latitude = null;
    protected static $longitude = null;
    protected static $paginate = 0;
    protected static $filter = [];

    public static function title($title){
        self::$title = $title;
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

    // List
    public static function list() {
        $list = YoebAddress::query();

        if (!empty(self::$country_id)) {
            $list = $list->where("country_id", self::$country_id);
        }
        if (!empty(self::$state_id)) {
            $list = $list->where("state_id", self::$state_id);
        }
        if (!empty(self::$city_id)) {
            $list = $list->where("city_id", self::$city_id);
        }
        if (!empty(self::$neighbourhood)) {
            $list = $list->where("neighbourhood", self::$neighbourhood);
        }
        if (!empty(self::$building_no)) {
            $list = $list->where("building_no", self::$building_no);
        }
        if (!empty(self::$floor)) {
            $list = $list->where("floor", self::$floor);
        }
        if (!empty(self::$apartment)) {
            $list = $list->where("apartment", self::$apartment);
        }
        if (!empty(self::$detail)) {
            $list = $list->where("detail", self::$detail);
        }
        if (!empty(self::$directions)) {
            $list = $list->where("directions", self::$directions);
        }
        if (!empty(self::$latitude)) {
            $list = $list->where("latitude", self::$latitude);
        }
        if (!empty(self::$longitude)) {
            $list = $list->where("longitude", self::$longitude);
        }
    
        if(self::$paginate){
            $data = $list->paginate(self::$paginate, self::$filter);
        }else{
            $data = $list->get(self::$filter);
        }

        return $data;
    }
}

?>

