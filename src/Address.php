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
    protected static $id                = null;
    protected static $numeric_code      = null;
    protected static $name              = null;
    protected static $iso2              = null;
    protected static $iso3              = null;
    protected static $phonecode         = null;
    protected static $capital           = null;
    protected static $currency          = null;
    protected static $currency_name     = null;
    protected static $currency_symbol   = null;
    protected static $tld               = null;
    protected static $native            = null;
    protected static $region            = null;
    protected static $subregion         = null;
    protected static $nationality       = null;
    protected static $emoji             = null;
    protected static $emojiu            = null;

    protected static $country_code      = null;
    protected static $country_name      = null;
    protected static $state_code        = null;
    protected static $state_name        = null;
    protected static $wikidataid        = null;

    protected static $title             = null;
    protected static $type              = null;
    protected static $country_id        = null;
    protected static $state_id          = null;
    protected static $city_id           = null;
    protected static $neighbourhood     = null;
    protected static $building_no       = null;
    protected static $floor             = null;
    protected static $apartment         = null;
    protected static $detail            = null;
    protected static $directions        = null;
    protected static $latitude          = null;
    protected static $longitude         = null;
    protected static $paginate          = 0;
    protected static $filter            = null;
    protected static $userId            = null;
    protected static $addressId         = null;

    public static function id($id){
        self::$id = $id;
        return new static;
    }

    public static function name($name){
        self::$name = $name;
        return new static;
    }

    public static function numeric_code($numeric_code){
        self::$numeric_code = $numeric_code;
        return new static;
    }

    public static function iso2($iso2){
        self::$iso2 = $iso2;
        return new static;
    }

    public static function iso3($iso3){
        self::$iso3 = $iso3;
        return new static;
    }

    public static function phonecode($phonecode){
        self::$phonecode = $phonecode;
        return new static;
    }

    public static function capital($capital){
        self::$capital = $capital;
        return new static;
    }

    public static function currency($currency){
        self::$currency = $currency;
        return new static;
    }

    public static function currency_name($currency_name){
        self::$currency_name = $currency_name;
        return new static;
    }

    public static function currency_symbol($currency_symbol){
        self::$currency_symbol = $currency_symbol;
        return new static;
    }

    public static function tld($tld){
        self::$tld = $tld;
        return new static;
    }

    public static function native($native){
        self::$native = $native;
        return new static;
    }

    public static function region($region){
        self::$region = $region;
        return new static;
    }

    public static function subregion($subregion){
        self::$subregion = $subregion;
        return new static;
    }

    public static function nationality($nationality){
        self::$nationality = $nationality;
        return new static;
    }

    public static function emoji($emoji){
        self::$emoji = $emoji;
        return new static;
    }

    public static function emojiu($emojiu){
        self::$emojiu = $emojiu;
        return new static;
    }

    public static function country_code($country_code){
        self::$country_code = $country_code;
        return (new static);
    }

    public static function country_name($country_name){
        self::$country_name = $country_name;
        return (new static);
    }

    public static function state_code($state_code){
        self::$state_code = $state_code;
        return (new static);
    }

    public static function state_name($state_name){
        self::$state_name = $state_name;
        return (new static);
    }

    public static function wikidataid($wikidataid){
        self::$wikidataid = $wikidataid;
        return (new static);
    }

    public static function title($title){
        self::$title = $title;
        return (new static);
    }

    public static function type(int $type){
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

        if (!empty(self::$id)) {
            $query = $query->where("id", self::$id);
        }
        if (!empty(self::$addressId)) {
            $query = $query->where("yoeb_addresses.id", self::$addressId);
        }
        if (!empty(self::$title)) {
            $query = $query->where("title", self::$title);
        }
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

    public static function first($query = null) {
        $list = self::baseQuery();
        if (is_callable($query)) {
            $query($list);
        }

        if(empty(self::$filter)){
            $data = $list->first();
        }else{
            $data = $list->first(self::$filter);
        }

        self::reset();

        return $data;
    }

    // Country
    public static function countryQuery() {
        $query = YoebCountry::query();
        if (!empty(self::$name)) {
            $query = $query->where("name", self::$name);
        }
        if (!empty(self::$country_id)) {
            $query = $query->where("country_id", self::$country_id);
        }
        if (!empty(self::$numeric_code)) {
            $query = $query->where("numeric_code", self::$numeric_code);
        }
        if (!empty(self::$iso2)) {
            $query = $query->where("iso2", self::$iso2);
        }
        if (!empty(self::$iso3)) {
            $query = $query->where("iso3", self::$iso3);
        }
        if (!empty(self::$phonecode)) {
            $query = $query->where("phonecode", self::$phonecode);
        }
        if (!empty(self::$capital)) {
            $query = $query->where("capital", self::$capital);
        }
        if (!empty(self::$currency)) {
            $query = $query->where("currency", self::$currency);
        }
        if (!empty(self::$currency_name)) {
            $query = $query->where("currency_name", self::$currency_name);
        }
        if (!empty(self::$currency_symbol)) {
            $query = $query->where("currency_symbol", self::$currency_symbol);
        }
        if (!empty(self::$tld)) {
            $query = $query->where("tld", self::$tld);
        }
        if (!empty(self::$native)) {
            $query = $query->where("native", self::$native);
        }
        if (!empty(self::$region)) {
            $query = $query->where("region", self::$region);
        }
        if (!empty(self::$subregion)) {
            $query = $query->where("subregion", self::$subregion);
        }
        if (!empty(self::$nationality)) {
            $query = $query->where("nationality", self::$nationality);
        }
        if (!empty(self::$emoji)) {
            $query = $query->where("emoji", self::$emoji);
        }
        if (!empty(self::$emojiu)) {
            $query = $query->where("emojiu", self::$emojiu);
        }

        return $query;
    }

    public static function countries($query = null) {
        $list = self::countryQuery();
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

    public static function country($id, $query = null) {
        $data = self::countryQuery();
        if (is_callable($query)) {
            $query($data);
        }
        if(!empty($id)){
            $data->where("id", $id);
        }
        if(!empty(self::$filter)){
            $data = $data->first(self::$filter);
        }else{
            $data = $data->first();
        }

        self::reset();
    }

    // State
    public static function stateQuery() {
        $query = YoebState::query();
        if (!empty(self::$name)) {
            $query = $query->where("name", self::$name);
        }
        if (!empty(self::$country_id)) {
            $query = $query->where("country_id", self::$country_id);
        }
        if (!empty(self::$numeric_code)) {
            $query = $query->where("numeric_code", self::$numeric_code);
        }
        if (!empty(self::$iso2)) {
            $query = $query->where("iso2", self::$iso2);
        }
        if (!empty(self::$iso3)) {
            $query = $query->where("iso3", self::$iso3);
        }
        if (!empty(self::$phonecode)) {
            $query = $query->where("phonecode", self::$phonecode);
        }
        if (!empty(self::$capital)) {
            $query = $query->where("capital", self::$capital);
        }
        if (!empty(self::$currency)) {
            $query = $query->where("currency", self::$currency);
        }
        if (!empty(self::$currency_name)) {
            $query = $query->where("currency_name", self::$currency_name);
        }
        if (!empty(self::$currency_symbol)) {
            $query = $query->where("currency_symbol", self::$currency_symbol);
        }
        if (!empty(self::$tld)) {
            $query = $query->where("tld", self::$tld);
        }
        if (!empty(self::$native)) {
            $query = $query->where("native", self::$native);
        }
        if (!empty(self::$region)) {
            $query = $query->where("region", self::$region);
        }
        if (!empty(self::$subregion)) {
            $query = $query->where("subregion", self::$subregion);
        }
        if (!empty(self::$nationality)) {
            $query = $query->where("nationality", self::$nationality);
        }
        if (!empty(self::$emoji)) {
            $query = $query->where("emoji", self::$emoji);
        }
        if (!empty(self::$emojiu)) {
            $query = $query->where("emojiu", self::$emojiu);
        }
        if (!empty(self::$latitude)) {
            $query = $query->where("latitude", self::$latitude);
        }
        if (!empty(self::$longitude)) {
            $query = $query->where("longitude", self::$longitude);
        }
        return $query;
    }

    public static function states($query = null) {
        $list = self::stateQuery();
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

    public static function state($id = null, $query = null) {
        $data = self::stateQuery();
        if (is_callable($query)) {
            $query($data);
        }
        if(!empty($id)){
            $data->where("id", $id);
        }
        if(!empty(self::$filter)){
            $data = $data->first(self::$filter);
        }else{
            $data = $data->first();
        }

        self::reset();

        return $data;
    }

    // City
    public static function CityQuery() {
        $query = YoebCity::query();
        if (!empty(self::$name)) {
            $query = $query->where("name", self::$name);
        }
        if (!empty(self::$state_id)) {
            $query = $query->where("state_id", self::$state_id);
        }
        if (!empty(self::$state_code)) {
            $query = $query->where("state_code", self::$state_code);
        }
        if (!empty(self::$country_id)) {
            $query = $query->where("country_id", self::$country_id);
        }
        if (!empty(self::$country_code)) {
            $query = $query->where("country_code", self::$country_code);
        }
        if (!empty(self::$country_name)) {
            $query = $query->where("country_name", self::$country_name);
        }
        if (!empty(self::$wikidataid)) {
            $query = $query->where("wikidataid", self::$wikidataid);
        }
        if (!empty(self::$latitude)) {
            $query = $query->where("latitude", self::$latitude);
        }
        if (!empty(self::$longitude)) {
            $query = $query->where("longitude", self::$longitude);
        }

        return $query;
    }

    public static function cities($query = null) {
        $list = self::cityQuery();
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

    public static function city($id = null, $query = null) {
        $data = self::cityQuery();
        if (is_callable($query)) {
            $query($data);
        }
        if(!empty($id)){
            $data->where("id", $id);
        }
        if(!empty(self::$filter)){
            $data = $data->first(self::$filter);
        }else{
            $data = $data->first();
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
            $remove->where("address_id", self::$addressId);
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
        self::$id                   = null;
        self::$numeric_code         = null;
        self::$name                 = null;
        self::$iso2                 = null;
        self::$iso3                 = null;
        self::$phonecode            = null;
        self::$capital              = null;
        self::$currency             = null;
        self::$currency_name        = null;
        self::$currency_symbol      = null;
        self::$tld                  = null;
        self::$native               = null;
        self::$region               = null;
        self::$subregion            = null;
        self::$nationality          = null;
        self::$emoji                = null;
        self::$emojiu               = null;

        self::$country_code         = null;
        self::$country_name         = null;
        self::$state_code           = null;
        self::$state_name           = null;
        self::$wikidataid           = null;

        self::$title                = null;
        self::$country_id           = null;
        self::$state_id             = null;
        self::$city_id              = null;
        self::$neighbourhood        = null;
        self::$building_no          = null;
        self::$floor                = null;
        self::$apartment            = null;
        self::$detail               = null;
        self::$directions           = null;
        self::$latitude             = null;
        self::$longitude            = null;
        self::$userId               = null;
        self::$addressId            = null;
    }

    public static function formatFilterColumns($columns)
    {
        return array_map(function($column) {
            return "yoeb_addresses.$column";
        }, $columns);
    }

}

?>

