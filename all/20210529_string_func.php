<?php
//mb functions strlen stb pár szó

    $str1='teszt';
    $str2='  teszt   ';
//trim 2 paraméter : amiket leszed: space, tab, újsor, ... mikor kerülhetne ilyenek be, space viszonylag egyszerű, de excelből ha bemásol vki akkor tab is odakerülhet akár
    /*echo var_dump($str1).'<br>';
    echo var_dump($str2).'<br>';
    echo var_dump(trim($str1)).'<br>';
    echo var_dump(trim($str2)).'<br>';*/
//ltrim
    //echo var_dump(ltrim($str1)).'<br>';
    //echo var_dump(ltrim($str2)).'<br>';
//rtrim
    //echo var_dump(rtrim($str1)).'<br>';
    //echo var_dump(rtrim($str2)).'<br>';

//strlen mb strlen string hossza
    /*$str3='multybyte_teszt1234567';
    $str4='multybyte_teszt1őűáéőú';
    echo strlen($str3).'<br>';
    echo strlen($str4).'<br>';
    echo mb_strlen($str3).'<br>';
    echo mb_strlen($str4).'<br>';*/

//strpos($miben,$mit,$offset=0);  a mit első előfordulását
    //offset honnan kezdje +/-
    //mb-s verzió
    /*$str5='Ebben fogunk kerbenesni';
    $str6='bben';
    $str7='ben';
    echo strpos($str5, $str6).'<br>';
    echo strpos($str5, $str7).'<br>';
    echo strpos($str5, $str7,3).'<br>';
    echo var_dump(strpos($str5, $str7,-3)).'<br>';
    echo var_dump(strpos($str5, $str7,-10)).'<br>';*/

//strrev
    /*$str8='ezt a szoveget megforditjuk';
    echo strrev($str8).'<br>';*/

//strtolower //mb
//strtoupper //mb
    /*$str9='VeGyeS';
    echo strtolower($str9).'<br>';
    echo strtoupper($str9).'<br>';
    $str10 = 'multiűÁéőÚ';
    echo strtolower($str10).'<br>';
    echo strtoupper($str10).'<br>';
    echo mb_strtolower($str10).'<br>';
    echo mb_strtoupper($str10).'<br>';*/

//substr($string, $honnan, $hossz) //mb
    //részszöveg képzés, 
    /*$str11='1990-09-22';
    echo substr($str11,-2).'<br>';
    echo substr($str11,-5, 2).'<br>';
    echo substr($str11,0,4).'<br>';
    echo substr($str11,0,-3).'<br>';*/


//number_format
    $szam=10000000.34;
    echo number_format($szam,1,',',' ').'<br>';
    echo number_format($szam).'<br>';


//strcmp //kisnagybetű érzékeny összehasonlítás //ha 0 jön vissza akkro egyenlőek
    /*$str12='vegyes';
    $str13='Vegyes';
    echo var_dump(strcmp($str12,$str13)).'<br>';
    echo var_dump(strcmp(strtolower($str12),strtolower($str13))).'<br>';*/
//strcasecmp
    //echo var_dump(strcasecmp($str12,$str13)).'<br>';


//explode egy stringet bont egy szperaátor mentén és tömbkétn visszadja, ha adunk meg limitet akkor a maradékot egy utolsó elemként
    /*$str14='1990-09-22';
    print_r(explode('-',$str14)).'<br>';
    $str15='ezt is szét bonthatjuk';
    print_r(explode(' ',$str15)).'<br>';
    print_r(explode('',$str15)).'<br>'; //a speratáro nem lehet üres*/

//implode explode ellentétete
    /*$tomb1 = array('a','b','c','d');
    echo implode("",$tomb1).'<br>';
    echo implode("-",$tomb1);*/


//str_split
    /*$str16='Ezt fel daraboljuk';
    print_r(str_split($str16));
    print_r(str_split($str16,3));*/


//str_repalce($mit, $mire, $miben, $maximumhányszor=null);
    /*$str18='Ebben fogunk cserelni';
    echo str_replace('fogunk cserelni','csereltunk',$str18);*/

//htmlentites kicseráli azokat a karaktereket amik a html feldoglozásakor hibát okoznának
    /*$str19="Ezt szeretném kiírni: </div> és még ezt is";
    echo "
        <div style='color:red'>$str19</div>
    
    
    ";
    $str20=htmlentities($str19);
    echo "
        <div style='color:red'>$str20</div>
    
    
    ";*/
//html_entity_decode
   /* echo $str20;
    echo html_entity_decode($str20);*/



//md5

//str_split

//str_pad
//str_repeat

//strip_tags

//str_word_count
//str_getcsv

//"" bachslash összefűzések escape karakterek


?>