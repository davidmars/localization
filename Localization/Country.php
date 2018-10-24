<?php

namespace Localization;

class Country{
    /**
     * @var String The iso code (FR for France, etc...)
     */
    public $code;
    /**
     * @var String The name of this country in english.
     */
    public $name;

    /**
     * @var Country[] all countries indexed by codes
     */
    public static $ALL=[];


    /**
     * Country constructor.
     * @param $code
     * @param $name
     */
    public function __construct($code,$name)
    {
        $this->code=$code;
        $this->name=$name;
    }

    /**
     * Return full list countries indexed by codes.
     * @return Country[]
     */
    public static function allFromJson($asArray=false){
        if(!self::$_allFromJson){
            $array=json_decode(file_get_contents(__DIR__."/../countries.json"));
            $return=[];
            foreach ($array as $c){
                $c=new Country($c->{'alpha-2'},$c->name);
                $return[$c->code]=$c;
            }
            self::$_allFromJson=$return;
        }

        if($asArray){
            $r=[];
            foreach (self::$_allFromJson as $c){
                $r[$c->name]=$c->code;
            }
            return $r;
        }

        return self::$_allFromJson;
    }

    /**
     * Return a Country object from its code.
     * @param string $code
     * @return Country
     */
    public static function getByCode($code){
        if(isset(self::allFromJson()[$code])){
            return self::allFromJson()[$code];
        }
        return null;

    }



    /**
     * @var Country[] cache for allFromJson method.
     */
    private static $_allFromJson;

}