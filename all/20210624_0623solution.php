<?php

//Vizsga gyakorló 06.23.

/*
1.Olvassuk be az tanulok.txt fájl tartalmát ami név és az osztály adatokat tartalmazza.
Hozzunk létre egy új fájlt, amelyben 3. osztályos tanulókat abc sorrendben szerepelnek.
*/

function input_to_third_grade_array($filename)
{
    $input = fopen($filename, "r");
    while (!feof($input)) {
        $token = explode(";", fgets($input));
        if (trim($token[1]) == '3') {
            $third_grades[] = trim($token[0]);
        }
    }
    fclose($input);
    return $third_grades;
}

function create_output($name_list, $filename)
{
    $output = fopen($filename, "wt");
    foreach ($name_list as $name) {
        fwrite($output, $name .PHP_EOL);
    }
    fclose($output);
}

/*
$third_grades = input_to_third_grade_array("20210623_tanulok.txt");
sort($third_grades);
//print_r($third_grades);
create_output($third_grades, "20210623_harmadikosok_abcben.txt");
*/

?>

<!--
2.Hozzunk létre egy felületet amin egy html form-ban tudjuk a következőket postolni.
• Termékneve
    • Nettó egységára
    • Áfa
Amennyiben minden mezőt kitöltünk session-ben tároljuk a küldött adatokat. Egy táblázatban jelenítsük meg a következő adatokat.
• Termékneve
    • Nettó egységára
    • Áfa (bruttó-nettó)
    • Bruttó (Nettó*((100+áfa)/100) egészre kerekítve
-->

<html>
<body>
<form action='' method='post'>
    <div style="padding-bottom: 10px">
        <label for="name">Termék neve: </label>
        <input type="text" name="name">
    </div>
    <div style="padding-bottom: 10px">
        <label for="net">Nettó egységára: </label>
        <input type="number" name="net" value="0"
            style="-webkit-appearance: none; margin: 0; -moz-appearance: textfield;">
    </div>
    <div style="padding-bottom: 10px">
        <label for="vat">Áfa: </label>
        <select name="vat">
            <option value="0">0%</option>
            <option value="5">5%</option>
            <option value="27" selected>27%</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Mentés">
    </div>
</form>

<table>
    <thead>
        <tr>
            <td>Termék neve</td>
            <td>Nettó egységára</td>
            <td>Áfa</td>
            <td>Bruttó ára</td>
        </tr>
    </thead>
    <tbody>
    <?php
        session_start();
        if (isset($_POST['clear']) && $_POST['clear'] == 'true') {
            unset($_SESSION["rows"]);
        }
        if (isset($_POST['name']) && $_POST['name'] != '' && $_POST['net'] != 0) {
            $net = $_POST['net'];
            $vat = $_POST['vat'];
            $gross = round($net * ((100 + $vat) / 100));
            $row = array($_POST['name'], $net, $gross - $net, $gross);
            $_SESSION['rows'][] = $row;
        }
        if (isset($_SESSION['rows'])) {
            foreach ($_SESSION['rows'] as $row) {
                $htmlrow = "<tr><td>";
                foreach ($row as $item) {
                    $htmlrow .= $item."</td><td>";
                }
                $htmlrow = mb_substr($htmlrow, 0, mb_strlen($htmlrow) - 4);
                echo $htmlrow;
            }
        }
    ?>
    </tbody>
</table>
<?php
    if (isset($_SESSION['rows'])) {
        echo '<form action="" method="post">
            <input type="hidden" name="clear" value="true">
            <input type="submit" value="Tábla törlése">
            </form>';
    }
?>
</body>
</html>

<?php

/*
3.Írj egy függvényt, amely a kapott tömb paraméter páratlan elemeit csökkenő sorrendben adja vissza.
fuggveny(array(3,5,10,14,1,4)) -> array(5,3,1)
*/

function nr3_function($a) {
    for($i = 0; $i < count($a); ++$i) {
        if ($a[$i] % 2 == 1) {
            $odd_a[] = $a[$i];
        }
    }
    rsort($odd_a);
    return $odd_a;
}

//print_r(nr3_function(array(3,5,10,14,1,4)));

/*
4.Írj egy függvényt, amely visszaadja az első 20, 0-nál nagyobb néggyel osztható számot egy tömbben
fuggveny()-> array(4,8,12,16…)
*/

function nr4_function() {
    for ($i = 1; $i <= 20; ++$i) {
        $ret_a[] = $i * 4;
    }
    return $ret_a;
}

//print_r(nr4_function());

/*
5.Írj egy függvényt. amely ha 3elemű tömböt kap paraméterként az elemek szorzatát adja vissza, ha 2 eleműt akkor az elemek összegét.
fuggveny(array(3,2,4))-> 24
fuggveny(array(3,2))-> 5
*/

function nr5_function($a) {
    switch (count($a)) {
        case 2:
            return $a[0] + $a[1];
        case 3:
            return $a[0] * $a[1] * $a[2];
        default:
    }
}

//echo nr5_function(array(3,2,4))."<br>";
//echo nr5_function(array(3,2))."<br>";


?>