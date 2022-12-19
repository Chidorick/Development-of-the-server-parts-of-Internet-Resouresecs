<!DOCTYPE html>
<html lang="ru">


<head>
    <meta charset="UTF-8">
    <title>Сортировка</title>
    <style>
        body {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <?php

    function quickSort($array)
    {

        if (sizeof($array) <= 1) return $array;
        $pivot = $array[0];

        $left = $right = array();

        for ($i = 1; $i < sizeof($array); $i++) {
            if ($array[$i] < $pivot) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }
        return array_merge(quickSort($left), array($pivot), quickSort($right));
    }

    if (isset($_GET['array'])) {
        $array = explode(",", $_GET["array"]);
        echo "<p>Массив</p>";
        echo "<p>[";
        echo implode(", ", $array);
        echo "]</p>";

        echo "<p>Отсортированный массив</p>";
        $array = quickSort($array);
        echo "<p>[";
        echo implode(", ", $array);
        echo "]</p>";
    } else {
        echo '<p>Отсутствует переменная: ?array=</p>';
    }

    ?>
</body>

</html>