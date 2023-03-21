<?php
function recursion(int $variable)
{
    if ($variable <= 0)
        return 1;
    else
            $factorial = $variable * recursion($variable - 1);
    return $factorial;
}
$variable = rand(0, 50);
$result= recursion($variable);
echo "Факторіал числа " .$variable ." дорівнює: ".$result;


