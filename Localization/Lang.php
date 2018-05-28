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
     * @return string path to the appropriate png
     */
    public function flagUrl($basePath=""){
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
        $array=json_decode(file_get_contents(__DIR__."/../languages.json"));
        $return=[];
        foreach ($array as $lang){
            $l=new Lang($lang->code,$lang->name,$lang->nativeName,$lang->flag);
            $return[$l->code]=$l;
        }
        return $return;
    }

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

}

