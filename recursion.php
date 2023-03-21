<?php
function recursion(int $variable):array
{
    $count = 1;
    $factorial = 1;
    if ($variable == 0)
        $factorial = 0;
    else
    {
        while ($count < $variable)
        {
            $factorial = $factorial * ($count + 1);
            $count++;
        }
    }
    return [$factorial,$variable];
}
$result= recursion(rand(0, 50));
echo "Факторіал числа " .$result[1] ." дорівнює: ".$result[0];
