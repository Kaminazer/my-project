<?php
function filter(string $input): string
{
    return trim(strip_tags($input));
}
function validLength(string $input): bool
{
    if (!empty($input)) {
        $length = mb_strlen($input, 'UTF-8');
        if ($length >= 2 && $length <= 32) {
            return true;
        }
    }
    return false;
}

function validDate(string $input): bool
{
    if (!empty($input)) {
        $input = explode("-", $input);
        $date = checkdate($input[1], $input[2], $input[0]);
        if ($input[0] >= 1900 && $input[0] <= 2023 && $date) {
            return true;
        }
    }
    return false;
}
function validCity($input): bool
{
    if (!empty($input)) {
        if (!preg_match('/^[a-zA-ZА-яІіЇїєЄ]+([-\s][a-zA-ZА-яіІїЇєЄ]+)?$/u', $input)) {
            return false;
        }
    }
    return true;
}

function validLastName($input): bool
{
    if (!empty($input)) {
        if (!preg_match('/^[a-zA-ZА-яІіЇїєЄ]+(-[a-zA-ZА-яіІїЇєЄ]+)?$/u', $input)) {
            return false;
        }
    }
    return true;
}