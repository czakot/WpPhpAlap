<?php
//[2,4,7,6,2,10,11] eredmény: 10
    echo 'Greatest even number of array<br><br>';

    $tomb = array(2,4,7,6,2,10,11);
//    $tomb = array(9,3, 5, 67, 11);
    print_r($tomb);
    echo "<br>";
    print_r(greatest_even_number($tomb));
    echo "<br>";

    function greatest_even_number($t) {
        $max = $t[0];
        for ($i = 1; $i < count($t); ++$i ) {
            $e = $t[$i];
            if ($e % 2 == 0 && $max < $e) {
                $max = $e;
            }
        }
        if ($max % 2 != 0) {
            $max = "The given array does not contain any even number.";
        }
        return $max;
    }
?>
