<?php

namespace Localization;

/**
 * Class Lang
 *
 * @package Localization
 */
class Lang
{
    /**
     * @var string the default url path for flags
     */
    public static $flagsUrlBasePath;
    /**
     * @var String The iso code (fr for french, en for englis, zh for chinese etc...)
     */
    public $code;
    /**
     * @var String The name of this language in english. (french for french language)
     */
    public $name;
    /**
     * @var String The name of this language in this laguage (français for french language)
     */
    public $localName;

    /**
     * @var String The code for an approriate flag
     */
    public $flagCountryCode;

    /**
     * To get the flag.png url
     * @param string $basePath The base url to the flag. Alternativaly you can define it via $flagsUrlBasePath static variable
     * @return string path to the appropriate png
     */
    public function flagUrl($basePath=""){
        if(!$basePath && self::$flagsUrlBasePath){
            $basePath=self::$flagsUrlBasePath;
        }
        return $basePath."".$this->flagCountryCode.".png";
    }

    /**
     * @var Lang[] all languages indexed by codes
     */
    public static $ALL=[];

    /**
     * Lang constructor.
     * @param $code
     * @param $name
     * @param $localName
     * @param string $flagCountryCode
     */
    public function __construct($code,$name,$localName,$flagCountryCode)
    {
        $this->code=$code;
        $this->name=$name;
        $this->localName=$localName;
        $this->flagCountryCode=$flagCountryCode;
    }

    /**
     * Return full list languages indexed by codes.
     * @return Lang[]
     */
    public static function allFromJson(){
        if(!self::$_allFromJson){
            $array=json_decode(file_get_contents(__DIR__."/../languages.json"));
            $return=[];
            foreach ($array as $lang){
                $l=new Lang($lang->code,$lang->name,$lang->nativeName,$lang->flag);
                $return[$l->code]=$l;
            }
            self::$_allFromJson=$return;
        }
        return self::$_allFromJson;
    }

    /**
     * @var Lang[] cache for allFromJson method.
     */
    private static $_allFromJson;

    /**
     * Return languages from the given lang codes
     * @param string[] $codes
     * @throws \Exception when a language code is not present in languages.json files
     * @return Lang[]
     */
    public static function allFromLangCodes($codes){
        $all=self::allFromJson();
        $return=[];
        foreach ($codes as $code){
            if(!isset($all[$code])){
                throw new \Exception("The language code $code is not referenced in languages.json");
            }
            $return[$code]=$all[$code];
        }
        return $return;
    }

    /**
     * Return a Lang object from its lang code.
     * @param string $langCode
     * @return Lang
     */
    public static function getByCode($langCode){
        return self::allFromJson()[$langCode];
    }

}

