<?php

function randomData(): array
{
    return [
        rand(2000,2025) => rand(1,100),
        rand(2000,2025) => rand(1,100),
        rand(2000,2025) => rand(1,100),
        rand(2000,2025) => rand(1,100),
        rand(2000,2025) => rand(1,100),
    ];
}

function randomColor(): string
{
    return 'rgb(' . rand(0,255).','.rand(0,255).','.rand(0,255).')';
}

function makeDiagram($array)
{
    foreach ($array as $key => $value)
    {
        echo "<div class='chart-item'>
              <p>$key - $value%</p>
                  <div class='pipe'>
                    <div style='width: $value%; background-color: ".randomColor()."'></div>
                  </div>
              </div>";
    }
}

$array = randomData();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Bar chart</title>
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
<div class='chart'>
    <?php makeDiagram($array); ?>
</div>
</body>
</html>
