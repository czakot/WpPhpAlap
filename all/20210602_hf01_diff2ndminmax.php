<?php
    echo "Difference of 2nd minimum and maximum of numbers in an array<br><br>";

    $tomb = array(2,4,7,6,2,10);
//    $tomb = array(2,3,2);
//    $tomb = array(2,2,2);
    print_r($tomb);
    echo "<br>";
    print_r(diff2ndminmax($tomb));
    echo "<br>";

    function diff2ndminmax($t) {
        sort($t);
        distinctify_seconds($t);
        return count($t) > 1 ?
            abs($t[1] - $t[count($t) - 2]) :
            "Error: less than two distinct elements in the array.";
    }

    function distinctify_seconds(&$t) {
        $idx = count($t) - 1;
        while ($idx > 0 && $t[$idx] == $t[$idx - 1]) {
            if ($t[$idx] == $t[$idx - 1]) {
                unset($t[$idx]);
            }
            --$idx;
        }
        $t = array_values($t);

        $topidx = count($t) - 1;
        $idx = 0;
        while ($idx < $topidx && $t[$idx] == $t[$idx + 1]) {
            if ($t[$idx] == $t[$idx + 1]) {
                unset($t[$idx]);
            }
            ++$idx;
        }
        $t = array_values($t);
    }
?>
