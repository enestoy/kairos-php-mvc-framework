<?php
namespace App\Helpers;

class DebugHelper
{
    public static function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}
