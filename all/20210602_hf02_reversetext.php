<?php
    echo "Reverse a text<br><br>";

//    $text = 'árvíztűrő tükörfúrógép';
    $text = "ynévggüf";
    print_r($text);
    echo "<br>";
    print_r(reverse_text($text));
    echo "<br>";

    function reverse_text($t):string {
        $rt = '';
        $idx = mb_strlen($t) - 1;
        while ($idx >= 0) {
            $rt .= mb_substr($t, $idx, 1);
            --$idx;
        }
        return $rt;
    }
?>
