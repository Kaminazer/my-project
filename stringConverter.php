<?php
const CONVERTER_MODE_UPPERCASE = 1; // Всі символи у верхньому регістрі
const CONVERTER_MODE_LOWERCASE = 2; // Всі символи у нижньому регістрі
const CONVERTER_MODE_UPPERFIRSTCASE = 3; // Перший символ рядка у верхньому регістрі, решта у нижньому
const CONVERTER_MODE_EWERYWORDCASE = 4; // Перший символ кожного слова у верхньому регістрі, решта у нижньому
const CONVERTER_MODE_INVERTCASE = 5; // Кожен символ у інвертованому регістрі
function stringConverter(string $string, int $mode)
{
    switch ($mode){
        case 1:
            return upper($string);
        case 2:
            return lower($string);
        case 3:
            return upperFirst($string);
        case 4:
            return everyWord($string);
        case 5:
            return invert($string);
        default:
            echo "Вказаний режим відсутній".PHP_EOL;
    }
}
function upper($string): string
{
    for ($i = 0; $i < strlen($string); $i++) {
        if (ord($string[$i]) > 96 && ord($string[$i]) < 123) {
            $string[$i] = chr(ord($string[$i]) - 32);
        }
    }
    return $string;
}
function lower($string): string
{
    for ($i = 0; $i < strlen($string); $i++) {
        if (ord($string[$i]) > 64 && ord($string[$i]) < 91 ) {
            $string[$i] = chr(ord($string[$i]) + 32);
        }
    }
    return $string;
}
function upperFirst($string): string
{
    if (ord($string[0]) > 96 && ord($string[0]) < 123) {
        $string[0] = chr(ord($string[0]) - 32);
    }

    for ($i = 1; $i < strlen($string); $i++) {
        if (ord($string[$i]) > 64 && ord($string[$i]) < 91 ) {
            $string[$i] = chr(ord($string[$i]) + 32);
        }
    }
    return $string;
}

function invert($string): string
{
    for ($i = 0; $i < strlen($string); $i++) {
        if (ord($string[$i]) > 96 && ord($string[$i]) < 123) {
            $string[$i] = chr(ord($string[$i]) - 32);
        } elseif (ord($string[$i]) > 64 && ord($string[$i]) < 91 ) {
            $string[$i] = chr(ord($string[$i]) + 32);
        }
    }
    return $string;
}

function everyWord($string): string
{
    $space = true;
    for ($i = 0; $i < strlen($string); $i++) {
        if (ord($string[$i]) == 32) { // символ пробіл
            $space = true;
        }
        if (ord($string[$i]) > 96 && ord($string[$i]) < 123 && $space) { // маленька буква після пробілу
            $string[$i] = chr(ord($string[$i]) - 32);

        }
        if (ord($string[$i]) > 64 && ord($string[$i]) < 91 && !$space) { // велика буква без пробілу
            $string[$i] = chr(ord($string[$i]) + 32);
        }

        if (ord($string[$i]) > 64 && ord($string[$i]) < 91 && $space) { // велика буква після пробілу
            $space = false;
        }
    }
    return $string;
}
echo stringConverter("HElLo wOrLd ser Dir mIr.",CONVERTER_MODE_UPPERCASE ).PHP_EOL;
echo stringConverter("HElLo wOrLd ser Dir mIr", CONVERTER_MODE_LOWERCASE ).PHP_EOL;
echo stringConverter("HElLo wOrLd ser Dir mIr", CONVERTER_MODE_UPPERFIRSTCASE).PHP_EOL;
echo stringConverter("HElLo wOrLd ser Dir mIr", CONVERTER_MODE_EWERYWORDCASE).PHP_EOL;
echo stringConverter("HElLo wOrLd ser Dir mIr", CONVERTER_MODE_INVERTCASE).PHP_EOL;