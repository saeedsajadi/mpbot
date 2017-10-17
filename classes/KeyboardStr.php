<?php
namespace Classes;

Class KeyboardStr
{
    private static $your_keyboard_str_sample = "your keyboard str sample";

    /**
     * return keyboard str sample variable value
     * @return string
     */
    public static function getYourKeyboardStrSample(): string
    {
        return self::$your_keyboard_str_sample;
    }

}