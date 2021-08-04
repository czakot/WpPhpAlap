<?php

/*
Czakó Tamás
PHP Vizsga 2021.06.26.
*/

/*
1.Olvassuk be a resztvevok.txt fájlt tartalmát, amely a név;csoport;pontszám adatokat tartalmazza.
Hozzunk létre egy új fájlt, acsoport.txt névvel, amely az A csoport résztvevőit listázza név szerint növekvő sorrendben. Az új fájlban csak a név;pontszám adat szerepeljen.
anév1;A;10
gnév1;B;11
dnév1;C;13
cnév1;A;16
bnév1;A;18

anév1;10
bnév1;18
cnév1;16
*/

function input_to_group_a($filename)
{
    $input = fopen($filename, "r");
    while (!feof($input)) {
        $token = explode(";", fgets($input));
        if (trim($token[1]) == 'A') {
            $group_a_members[] = trim($token[0].";".$token[2]);
        }
    }
    fclose($input);
    return $group_a_members;
}

function create_output($list, $filename)
{
    $output = fopen($filename, "wt");
    foreach ($list as $row) {
        fwrite($output, $row .PHP_EOL);
    }
    fclose($output);
}

// Teszt
/*
$group_a = input_to_group_a("resztvevok.txt");
sort($group_a);
//print_r($group_a);
create_output($group_a, "acsoport.txt");
*/

?>

<!--
2.Hozzunk létre egy felületet, amelyen egy html formban a következőket tudjuk postolni:
    • Név
    • Magasság (cm)
    • Testtömeg (kg)
Amennyiben minden mezőt kitöltünk session-ben tároljuk a küldött adatokat. Egy táblázatban jelenítsük meg a következő adatokat
    • Név
    • Magasság (cm)
    • Testtömeg (kg)
    • BMI 2 tizedesjegyre kerekítve
BMI= Testtömeg/(Magasság(m) ²)
pl.:magasság=180 cm testtömeg=80kg
24,69= 80/((180/100) *(180/100))
-->

<html>
<body>
<form action='' method='post'>
    <div style="padding-bottom: 10px">
        <label for="name">Név: </label>
        <input type="text" name="name">
    </div>
    <div style="padding-bottom: 10px">
        <label for="height">Magasság (cm): </label>
        <input type="number" name="height" value="0"
               style="-webkit-appearance: none; margin: 0; -moz-appearance: textfield;">
    </div>
    <div style="padding-bottom: 10px">
        <label for="weight">Testtömeg (kg): </label>
        <input type="number" name="weight" value="0"
               style="-webkit-appearance: none; margin: 0; -moz-appearance: textfield;">
    </div>
    <div>
        <input type="submit" value="Mentés">
    </div>
</form>

<table>
    <thead>
    <tr>
        <td>Név</td>
        <td>Magasság (cm)</td>
        <td>Testtömeg (kg)</td>
        <td>BMI</td>
    </tr>
    </thead>
    <tbody>
    <?php
    session_start();
    if (isset($_POST['clear']) && $_POST['clear'] == 'true') {
        unset($_SESSION["rows"]);
    }
    if (isset($_POST['name']) && $_POST['height'] != '' && $_POST['weight'] != 0) {
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $bmi = round($weight / (($height / 100) ** 2), 2);
        $row = array($_POST['name'], $height, $weight, $bmi);
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
3. Írj egy függvényt, amely egy kapott szóközökkel elválasztott szövegben megkeresi a legrövidebb szót
fuggveny(„amely egy kapott szóközökkel elválasztott szövegben”) -> „egy”
*/

function function3($s) {
    $words = explode(" ", trim($s));
    $idx = 0;
    $idx_shortest = -1;
    $length_shortest = mb_strlen($s);
    while ($idx < count($words)) {
        if (mb_strlen($words[$idx]) < $length_shortest) {
            $length_shortest = mb_strlen($words[$idx]);
            $idx_shortest = $idx;
        }
        ++$idx;
    }
    if ($idx_shortest != -1) {
        return $words[$idx_shortest];
    }
}

// Teszt
//echo function3("amely egy kapott szóközökkel elválasztott szövegben")."<br>";

/*
4. Írj egy függvényt, amely visszaadja egy paraméterben kapott első olyan elemét amely hárommal és néggyel is osztható
fuggveny(array(1,3,24,6,9,3,12,10)) -> 24
*/

function function4($a) {
    $idx = 0;
    $found = false;
    while ($idx < count($a) && !$found) {
        $found = ($a[$idx] % 3 == 0 && $a[$idx] % 4 == 0);
        if (!$found) {
            ++$idx;
        }
    }
    return $a[$idx];
}

// Teszt
//echo function4(array(1,3,24,6,9,3,12,10))."<br>";

/*
5. Írj egy függvényt, amely kiírja az első 13, nullánál nagyobb hárommal osztható számot.
fuggveny() -> 3 6 9 12 ….
*/

function function5() {
    for ($i = 1; $i <= 13; ++$i) {
        echo ($i * 3)." ";
    }
    echo "<br>";
}

// Teszt
//function5();

?>
