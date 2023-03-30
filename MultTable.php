<html>

<head>
    <title>Multiplication table in PHP</title>
    <style type="text/css">
        body {
            font-size: 12px;
        }

        td {
            height: 24px;
            text-align: center;
            width: 24px;
        }

        td.orange {
            background-color: orange;
        }

        td.white {
            background-color: #fff;
        }

        td a {
            display: block;
            text-decoration: none;
        }
    </style>
</head>
<body>
<table border="1">
    <?php
    $cols = 11;
    $rows = 11;
    for ($r = 1; $r < $rows; $r++) {
        echo "<tr>";
        for ($c = 1; $c < $cols; $c++) {
            ($r == 1 || $c == 1) ? $bg = "orange" : $bg = "white";
            echo "<td class='$bg'>" . $r * $c . "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
