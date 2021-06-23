<?php
    echo 'Average of array values round to two decimals<br><br>';

    $tomb = array(2,4,7,6,2,10);
    print_r($tomb);
    echo "<br>";
    print_r(average2Dec($tomb));
    echo "<br>";

    function average2Dec($t):float {
        $sum = 0;
        foreach ($t as $value) {
            $sum += $value;
        }
        return number_format($sum / count($t), 2);
    }
?>