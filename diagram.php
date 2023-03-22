<?php
function randomData():array
{
    $key = 2000;
    for($i = 0; $i <= 23; $i++)
    {
        $index[$i] = $key;
        $key++;
        $value[$i] = rand(0, 100);
    }
    return array_combine($index, $value);
}

function randomColor():string
{
    $red = rand(0,255);
    $green = rand(0,255);
    $blue = rand(0,255);

    return "rgb($red, $green, $blue)";
}
function makeDiagram(array $data):void
{
    for($i = 2000; $i <= 2023; $i++)
    {
        echo '<div class="chart-item">';
        echo "<p>$i рік, $data[$i]%</p>";
        echo '<div class="pipe">';
        echo "<div style=\"width:".$data[$i]."%;background-color:".randomColor()."\">";
        echo "</div>";
        echo "</div>";
    }
}
$data = randomData();
$color = randomColor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Діаграма</title>
    <style>
        .chart .pipe {
            background: #eee none repeat scroll 0 0;
            box-shadow: 3px 3px 3px 0 rgb(200, 200, 200) inset;
        }
        .chart .pipe {
            width: 100%;
            height: 10px;
            border-radius: 5px;
            margin-bottom: 0.8em;
        }
        .chart p {
            margin: 0 0 3px
        }
        .chart .pipe > div {
            /*background: #dc3545 none repeat scroll 0 0;*/
            border-radius: 5px;
            height: 10px;
        }
    </style>
</head>
<body>
<div class="chart">
<?php
makeDiagram($data);
?>
</div>
</body>
</html>



