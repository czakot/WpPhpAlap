<?php
    echo 'Convert numbers between numeric systems (max hexadecimal)<br><br>';

    $from = "2";
    $number = "11111010";
    $to = 8;
    echo $from."(".$number.") == convert to ==> ".$to."(".convert($from, $to, $number).")<br>";

    function convert($f, $t, $n):string {
        $decimal = convertTo10($f, $n);
        return convertToN($t, $decimal);
    }

    function convertTo10($b, $s):int {
        $digits = "0123456789ABCDEF";
        $decimalValue = 0;
        for ($idx = 0; $idx < strlen($s); ++$idx) {
            $decimalValue = $decimalValue * $b + strpos($digits, (string)$s[$idx]);
        }
        return $decimalValue;
    }

    function convertToN($b, $d):string {
        $digits = "0123456789ABCDEF";
        $reverseConverted = '';
        while ($d != 0) {
            $idx = $d % $b;
            $d = intdiv($d, $b);
            $reverseConverted .= $digits[$idx];
        }
        return strrev($reverseConverted);
    }
?>
