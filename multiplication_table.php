<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/table.css">
    <title>Таблиця множення</title>
</head>
<body>
<table>
<?php
$row = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$column = ["", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$table = [];
array_unshift($table,$row);
for ($i=0; $i < 11; $i++)
{
    echo "<tr>";
    printf("<th>"." ".$column[$i]."</th>");
    for ($j=0; $j < 10; $j++)
    {
        $table[$i+1][$j] = $row[$i]* $row[$j];
        printf("<td>".$table[$i][$j]."</td>");
    }
    echo "</tr>";
}
?>
</table>
</body>
</html>



