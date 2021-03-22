<?php
if (!function_exists('getConfig')):
    function getConfig($option){
        $row = \DB::table('configs')->select('value')->where('name', $option)->first();
        if (is_null($row)) {
            return null;
        } else {
            return $row->value;
        }
    }
endif;

if (!function_exists('setConfig')):
    function setConfig($name, $value){
        $row = \DB::table('configs')->select('value')->where('name', $name)->first();
        if (is_null($row)) {
            \DB::table('configs')->insert(['name' => $name, 'value' => $value]);
        } else {
            \DB::table('configs')->where('name', $name)->update(['value' => $value]);
        }
    }
endif;