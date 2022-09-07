<?php

namespace Abdelrahman\PhpMvc\Support;

use ArrayAccess;
use PhpParser\Node\Expr\CallLike;

use function PHPUnit\Framework\isNull;

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
        if ($array instanceof ArrayAccess) {

            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }

    public static function has($array, $keys)
    {
        if (is_null($keys)) {

            return false;
        }

        $keys  = (array) $keys;


        if ($keys == []) {
            return false;
        }

        foreach ($keys as $key) {

            $subArray = $array;

            if (static::exists($array, $key)) {

                continue;
            }


            foreach (explode('.', $key) as $segment) {

                if (static::accessable($subArray) && static::exists($subArray, $segment)) {

                    $subArray = $subArray[$segment];
                } else {

                    return false;
                }
            }
        }

        return true;
    }

    public static function last($array, callable $callBack = null, $default = null)
    {

        if (is_null($callBack)) {

            return empty($array) ? value($default) : end($array);
        }


        return static::first(array_reverse($array, true), $callBack, $default);
    }

    public static function first($array, callable $callBack = null, $default = null)
    {

        if (is_null($callBack)) {

            if (empty($array)) {

                return value($default);
            }

            foreach ($array as $item) {
                return $item;
            }
        }

        foreach ($array as $key => $value) {
            if (call_user_func($callBack, $value, $key)) {

                return $value;
            }
        }

        return value($default);
    }

    public static function forget($array, $keys)
    {

        $original = &$array;

        $keys = (array) $keys;

        if (!count($keys)) {

            return;
        }

        foreach ($keys as $key) {


            if (static::exists($array, $key)) {
                unset($array[$key]);

                continue;
            }

            $parts = explode('.', $key);


            while (count($parts) > 1 ) {

                // var_dump( $parts);

                $part = array_shift($parts);

                if (isset($array[$part]) && is_array($array[$part])) {

                    $array = &$array[$part];
                } else {

                    continue;
                }

                unset($array[array_shift($parts)]);
            }

            // var_dump($array[array_shift($parts)]);

        }
    }
}
