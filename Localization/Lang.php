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
    public function flagUrl(){
        return __DIR__."/..flags/".$this->code.".png";
    }

    /**
     * @var Lang[] all languages indexed by codes
     */
    public static $ALL=[];

    public function __construct($code,$name,$localName,$flagCountryCode)
    {
        $this->code=$code;
        self::$ALL[]=$this;
    }

}


new Lang("fr","french","frnaçais","fr");
new Lang("en","english","english","gb");
new Lang("it","italian","italiano","it");
new Lang("es","spanish","español","es");
