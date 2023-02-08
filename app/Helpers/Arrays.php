<?php

namespace App\Helpers;

class Arrays
{
    public static function keysToSnakeCase(&$array): void
    {
        foreach (array_keys($array) as $key) {
            $value = &$array[$key];
            unset($array[$key]);

            $transformedKey = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', ltrim($key, '!')));

            if (is_array($value)) {
                self::keysToSnakeCase($value);
            }

            $array[$transformedKey] = $value;
            unset($value);
        }
    }

    public static function keysToCamelCase(&$array): void
    {
        foreach (array_keys($array) as $key) {
            $value = &$array[$key];
            unset($array[$key]);

            $transformedKey = lcfirst(implode('', array_map('ucfirst', explode('_', $key))));

            if (is_array($value)) {
                self::keysToCamelCase($value);
            }

            $array[$transformedKey] = $value;
            unset($value);
        }
    }
}
