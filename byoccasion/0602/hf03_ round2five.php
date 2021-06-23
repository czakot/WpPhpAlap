<?php
    echo "Round to 5<br><br>";

    $number = 16;
    print_r($number);
    echo " == round to 5 ==> ";
    print_r(round_to_five($number));
    echo "<br>";

    function round_to_five($n) {
        return (intdiv($n,5) * 5 + ($n % 5 <= 2 ? 0 : 5));

    }
?>
