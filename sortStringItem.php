<?php
function stringSort (string $input, string $separator = ", "): string
{
    $array = explode($separator, $input);
    sort($array);
    return implode($separator, $array);
}
echo stringSort("Ukraine-Uganda-Urugway-Germany-France-Italy-Bulgaria", "-").PHP_EOL;
