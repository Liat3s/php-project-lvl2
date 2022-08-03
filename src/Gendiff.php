<?php

namespace Php\Project\Lvl2\Gendiff;

//require_once __DIR__ . '/../vendor/autoload.php';

function gendiff($pathA, $pathB)
{
    $result = '';
    $fileA = \json_decode(\file_get_contents($pathA, true));
    $fileB = \json_decode(\file_get_contents($pathB, true));

    $keys = array_merge(get_object_vars($fileA), get_object_vars($fileB));
    $keys = array_keys($keys);

    \sort($keys);

    foreach ($keys as $key) {
        if(isset($fileA->$key) && isset($fileB->$key)) {
            if ($fileA->$key === $fileB->$key) {
                $result .= ('   ' . $key . ': ' . $fileA->$key . "\n");
            } else {
                $result .= (' - ' . $key . ': ' . $fileA->$key . "\n");
                $result .= (' + ' . $key . ': ' . $fileB->$key . "\n");
            }
        } elseif (!isset($fileA->$key) && isset($fileB->$key)) {
            $result .= (' + ' . $key . ': ' . $fileB->$key . "\n");
        } else {
            $result .= (' - ' . $key . ': ' . $fileA->$key . "\n");
        }
    }
    return $result;
}
