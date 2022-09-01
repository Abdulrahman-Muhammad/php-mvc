<?php

namespace Abdelrahman\PhpMvc\Support;

use ArrayAccess;

class Arr
{
    public static function only($array, $keys)
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }


    public static function accessable($value)
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }


    public static function exists($array, $key)
    {
        if($array instanceof ArrayAccess){

            return $array->offsetExists($key);

        }

        return array_key_exists($key , $array );
    }

    public static function has($array , $keys )
    {
        if(is_null($keys)){

            return false;
        }

        $keys  = (array) $keys;


        if($keys == []){
            return false ;
        }

        foreach($keys as $key ){

            $subArray = $array;

            if(static::exists($array , $key)){

                continue;
            }


            foreach(explode('.' , $key) as $segment ){

                if(static::accessable($subArray) && static::exists($subArray , $segment)){

                    $subArray = $subArray[$segment];
                }


            }
        }
    }
}
