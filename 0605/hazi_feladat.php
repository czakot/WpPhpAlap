<?php

//0602 Házifeladat megoldások
/*1. Írj egy függvényt ami visszaadja a második legkisebb és legnagyobb szám közti különbséget!
    pl: [2,4,7,6,2,10] eredmény: 3
2. Írj egy függvényt ami manuálisan megfordít egy szöveget!
    pl: függvény->ynévggüf
3. Írj egy függvényt ami 5 egészre kerekít!
    pl: otre_kerekit(16)->15
4. Írj egy függvényt ami paraméterben megadott egészszámra kerekít!
    pl: kerekit(19,17) -> 17 
5. Írj egy függvényt ami manuálisan 2 számrendszer között vált át egy számot!
    pl: 2(1111)->10(15)
6. Számoljuk ki egy tömb értékeinek az átlagát 2 tizedesre kerekítve!
    pl: [2,4,7,6,2,10] eredmény: 5,17
7. Írassuk ki a 10x10-es szorzó táblát egy html táblázatba
8. Keressük meg a legnagyobb páros számot a kapott tömbben
    pl: [2,4,7,6,2,10,11] eredmény: 10
9. Töltsünk fel egy tömböt az első  nullánál nagyobb 100 páros számmal 
10. Írjunk egy függvényt ami egy szövegként kapott műveletet elvégez.
    pl: 10+30-20 -> 20   10+30-20x2 -> 0  10+(30-20)x2 -> 30(edited)*/


/*
1. Írj egy függvényt ami visszaadja a második legkisebb és legnagyobb szám közti különbséget!
    pl: [2,4,7,6,2,10] eredmény: 3
*/ 

/*function masodik_legkisebb_második_legnagyobb_kulonbsege ($rendezetlen) { 


    $tmp_rendezetlen=$rendezetlen;

    //rendezett tömb létrehozása
    for ($i=0; $i < count($rendezetlen); $i++) { 
        $min=null;
        for ($j=0; $j < count($tmp_rendezetlen); $j++) { 
            if ($tmp_rendezetlen[$j]<$min || is_null($min)) {
            $min=$tmp_rendezetlen[$j];
            $min_index=$j;
            }
        }

        $rendezett[]=$min;
        unset($tmp_rendezetlen[$min_index]);
        $tmp_rendezetlen=array_values($tmp_rendezetlen);
    }

    print_r($rendezett);

    //duplikációk törlése
    for ($i=1; $i < count($rendezett); $i++) { 
        echo $rendezett[$i].'<br>';
        if ($rendezett[$i-1]==$rendezett[$i]) {
            unset($rendezett[$i-1]);
        }
    }
    print_r($rendezett);
    
    //elemszám ellenőrzése


    //vissaztérési érték: [1] [utolsóelőtti] index különbsége

    
}

$rendezetlen=array(2,4,4,4,7,6,6,2,10);
masodik_legkisebb_második_legnagyobb_kulonbsege ($rendezetlen);*/

/*
2. Írj egy függvényt ami manuálisan megfordít egy szöveget!
    pl: függvény->ynévggüf
*/

/*echo '<br><b>2. feladat:</b> Szöveg fordítás<br>';
    function text_reverse($text){
        $reverse_text = '';
        //echo strlen($text).'<br>';
        for ($i=mb_strlen($text)-1; $i>=0 ; $i--){
            // $reverse_text .= $text[$i];
            $reverse_text .= mb_substr($text, $i, 1);
        }
        return $reverse_text;
    }

    echo 'függvény => '.text_reverse('függvény').'<br>';
    echo 'ez egy hosszabb szovegecske => '.text_reverse('ez egy hosszabb szovegecske').'<br>';
    echo 'ide meg csak irok valamit => '.text_reverse('ide meg csak irok valamit').'<br>';*/

/*
3. Írj egy függvényt ami 5 egészre kerekít!
    pl: otre_kerekit(16)->15
*/

/*echo '<br><b>3.feladat:</b> 5-re kerekítés<br>';
    function round5($number){
        $rounded_number = null;
        $body_num = substr($number, 0, -1);
        $last_num = substr($number, -1);

        $round_to_five = array(3, 4, 5, 6, 7);
        // $round_to_zero = array(3, 4, 5, 6, 7);

        if(in_array($last_num, $round_to_five)){
            $last_num = 5;
            $rounded_number = $body_num.$last_num;
        } else {
            $rounded_number = (round($number/10))*10;
        }


        return $rounded_number;
    }
    echo '16 => '.round5(16).'<br>';
    echo '95833 => '.round5(95833).'<br>';
    echo '2449 => '.round5(2449).'<br>';
    echo '987462 => '.round5(987462).'<br>';
    echo '4967528 => '.round5(4967528).'<br>';*/

    /*function RoundToFive($number = 0){
        if ($number) { $a = fmod($number, 5);
          if ($a<2.5) { $number -= $a; } else { $number += 5-$a; }
        }
        else { echo 'Nem adott meg számot!'; }
        return number_format( $number , 2 , ',' , ' ' );
      
    }

    $a = 10.00; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 11.00; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 12.00; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 12.49; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 12.50; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 12.51; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 13.00; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 14.00; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 15.00; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 16.00; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';
    $a = 17.49; echo number_format( $a , 2 , ',' , ' ' ).'  ......  '.RoundToFive($a).'<br>';*/

    /*4. Írj egy függvényt ami paraméterben megadott egészszámra kerekít!
    pl: kerekit(19,17) -> 17 */
    /*function kerekito($szam,$mire) {
        if ($mire>0) {
            return round($szam/$mire)*$mire;
        }
    }

    echo kerekito(32.5,17);*/

 /*5. Írj egy függvényt ami manuálisan 2 számrendszer között vált át egy számot!
    pl: 2(1110)->10(15)*/   
    /*
    //átváltju 10-esbe
        visszafelé haladva számjegyenként a helyiértékekkel szorozzuk

    //10-es számrendbeli érték

    

    //ezt átváltjuk egy másikba
        while ciklus
            15%10=5; 
            5 lesz a végén

    
    
    */
    
    /*6. Számoljuk ki egy tömb értékeinek az átlagát 2 tizedesre kerekítve!
    pl: [2,4,7,6,2,10] eredmény: 5,17*/
    

    /*7. Írassuk ki a 10x10-es szorzó táblát egy html táblázatba*/
    function szorzo_tabla() {
    $ret='';
    $sor='';
    for ($i=0; $i <= 10 ; $i++) { 
        
        for ($j=0; $j <=10 ; $j++) { 
            
            if ($j==0) {
                $sor .="<td>$i</td>"; 
            } elseif($i==0) {
                $sor .="<td>$j</td>"; 
            } else {
                $sor .="<td>".$i*$j."</td>";
            }
        }
        $ret .= "<tr>".$sor."</tr>";
        $sor='';
    }
    


    $ret = "<table>".$ret."</table>";

    return $ret;
    }
    echo szorzo_tabla();

    /*8. Keressük meg a legnagyobb páros számot a kapott tömbben
    pl: [2,4,7,6,2,10,11] eredmény: 10*/
    //sorrendezés és visszafelé megkeressük az első páros számot
    //vagy végig megyünk megkeressük a legnagoybbat és amelyik

    /*9. Töltsünk fel egy tömböt az első  nullánál nagyobb 100 páros számmal */
    //egytől nézzük és megnézzük páros-e, közben számoljuk hogy megvan-e 100 darab
    //kettesével haladunk és összgyűjtjük
?>