<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Фигуры</title>
    <style>
        svg>rect,
        svg>polygon,
        svg>circle {
            stroke: black;
            stroke-width: 1px;
        }

        body {
            font-size: 24px;
        }

        svg {
            height: 500px;
            width: 500px;
        }
    </style>
</head>

<body onload="runner()">


    <?php
    if (isset($_GET['num'])) {
        $num = $_GET['num']; 
        echo 'Число: ' . $num . ' Двоичный вид: '
            . sprintf("%07d", decbin(strval($num))) . '<br>';

        $shape =    ($num >> 5) & 3;
        $red =      ($num >> 4) & 1;
        $green =    ($num >> 3) & 1;
        $blue =     ($num >> 2) & 1;
        $size =    (($num >> 0) & 3) + 1;
        $color = '"#'
            . ($red == 1    ? 'ff' : "00")
            . ($green == 1  ? 'ff' : "00")
            . ($blue == 1   ? 'ff' : "00") . '"';
        $size = $size * 100;

        $shape_tag = '';
        switch ($shape) {
            case 0:
                $radius = ($size / 2);
                $shape_tag = "circle "
                    . " cx=" . ($radius + 10) . " cy=" . ($radius + 10)
                    . " r=" . $radius . " ";
                break;
            case 1:
                $shape_tag = "rect "
                    . "width=" . ($size * 2) . " height=" . ($size);
                break;
            case 2:
                $shape_tag = "rect "
                    . "width=" . ($size) . " height=" . ($size);
                break;
            case 3:
                $side = $size;
                $shape_tag = "polygon points='"
                    . ($side / 2 + 5) . ",10"
                    . " 10," . ($side) . " "
                    . ($side) . "," . ($side) . "'";
                break;
        }
        echo '<svg>';
        echo '<' . $shape_tag . ' fill=' . $color . '  />';
        echo '</svg>';
    } else {
        echo '<p>Отсутствует переменная: ?num=</p>';
    }
    ?>
</body>

</html>