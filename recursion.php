<?php
function recursion(int $variable):array
{
    $count = 1;
    $result = 1;
    $factorial = 1;
    if ($variable == 0)
        $factorial = 0;
    else
    {
        while ($count < $variable)
        {
            $result = $factorial;
            $factorial = $result * ($count + 1);
          //  echo $factorial.PHP_EOL;
            $count++;
        }
    }
    return [$factorial,$variable];
}
$result= recursion(rand(0, 50));
echo "Факторіал числа " .$result[1] ." дорівнює: ".$result[0];