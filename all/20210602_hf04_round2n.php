<?php
echo "Round to N<br><br>";

$number = 19;
$roundingTo = 17;
print_r($number);
echo " == round to ".$roundingTo." ==> ";
print_r(roundToN($number, $roundingTo));
echo "<br>";

function roundToN($n, $r) {
    return (intdiv($n,$r) * $r + ($n % $r <= intdiv($r, 2) ? 0 : $r));

}
?>
