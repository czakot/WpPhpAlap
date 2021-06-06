<?php
//ARRAY functions

//array() //létrehozás
//print_r(array(1,4,6,9));

//count a tömb elemei

//array_chunk($tomb,$darab);

//array_column több dimenziós tömbnél egy visszaadja az egyik index értékeit
/*$tomb=array(
    array(
        'name'=>'Tamás',
        'eredemeny'=>5,
    ),
    array(
        'name'=>'Dávid',
        'eredemeny'=>4,
    ),
    array(
        'name'=>'Béla',
        'eredemeny'=>2,
    )
);
print_r(array_column($tomb,'name'));*/

//array_combine($kulcs_tomb,$ertek_tomb);
/*$kulcs_tomb=array(1,5,7,8,2);
$ertek_tomb=array(4,6,3,9,11);
print_r(array_combine($kulcs_tomb,$ertek_tomb));*/

/*$kulcs_tomb=array(1,5,8,8);
$ertek_tomb=array(4,6,3,9,11);
print_r(array_combine($kulcs_tomb,$ertek_tomb));*/

//array_count_values();
//print_r(array_count_values(array(1,3,5,4,5,5,1,1,1)));

//array_diff($tomb1,$tomb2); //visszaadja az értékek közti különséget
/*$tomb1=array(1=>'piros',3=>'kék',5=>'zöld',2=>'sárga');
$tomb2=array(7=>'piros',2=>'kék',5=>'zöld');
//print_r(array_diff($tomb1,$tomb2));
print_r(array_diff_assoc($tomb1,$tomb2));*/

//array_filter egy függvénnyel szűri a tömbünket ha függvéyn igazat ad vissaz
/*$tomb=array(1,4,7,9,2,5,7);
function haromnal_nagyobb($ertek) {
    if ($ertek>3) {
        return true;
    }
}
print_r(array_filter($tomb,"haromnal_nagyobb"));*/

//array_flip(); kicseréli a kulcsokat az értékekkel
//print_r(array_flip(array('kulcs'=>'ertek')));

/*$tomb1=array(1=>'piros',3=>'kék',5=>'zöld',2=>'sárga');
$tomb2=array(7=>'piros',2=>'kék',5=>'zöld');
print_r(array_intersect($tomb1,$tomb2)); //értékek egyezzősége
print_r(array_intersect_key($tomb1,$tomb2)); //kulcsok egyezősége
print_r(array_intersect_assoc($tomb1,$tomb2)) ; //kulcs és érték is egyezzen*/



//array_key_exits(); létezik-e a kulcs a tömbben
/*$tomb=array('d','t','l','s','u');
var_dump(array_key_exists(2,$tomb));
var_dump(array_key_exists(8,$tomb));*/


//array_map(); minde tömb elemmel elvégez egy műveletet //vissaztérési értékben adja az edeti tömb váltoaztlana marad
/*$tomb=array(1.2,3.2,4.5);
$ret=array_map("floor",$tomb);
print_r($ret);
print_r($tomb);

function haromnal_nagyobb_string($ertek) {
    if ($ertek>3) {
        return 'nagyobb háromnál';
    } else {
        return 'kisebb háromnál';
    }
}
$ret=array_map("haromnal_nagyobb_string",$tomb);
print_r($ret);*/


//array_walk
/*$tomb=array(1.2,3.2,4.5);
$ret=array_walk($tomb,"floor");
function floor_sajat($key,$value) {
    return floor($value);
}
$ret=array_walk($tomb,"floor_sajat");

print_r($ret);
print_r($tomb);*/

//array_merge() //összeolvasztja
/*$tomb1=array(1=>'piros',3=>'kék',5=>'zöld',2=>'sárga');
$tomb2=array(7=>'piros',2=>'kék',5=>'zöld');
print_r(array_merge($tomb1,$tomb2,$tomb1));*/


//array_pop() //utolsó elem
/*$tomb1=array(1=>'piros',3=>'kék',5=>'zöld',2=>'sárga');
echo array_pop($tomb1);*/

//array_push($tomb,$elem1,$elem2);

//array_reverse();

//array_search
/*$tomb1=array(1=>'piros',3=>'kék',5=>'zöld',2=>'sárga');
echo array_search('kék',$tomb1);
var_dump(array_search('kkkkék',$tomb1));*/

//array_shift //első elemet eltávolitja
//array_unshift //első elemnek beszúrja
/*$tomb1=array(1=>'piros',3=>'kék',5=>'zöld',2=>'sárga');
print_r($tomb1);*/

//array_slice($tömb,start,hossz, kulcsok);
/*$tomb=array(1,4,3,5,3,2);
print_r(array_slice($tomb,3,2,true));*/

//array_sum, array_product
/*$tomb=array(1,'4','dasd',5,3,2);
    echo array_sum($tomb).'<br>';
    echo array_product($tomb).'<br>';
$tomb=array(1,4,2,5,3,2);
    echo array_sum($tomb).'<br>';
    echo array_product($tomb).'<br>';*/

//sort
/*$tomb=array(1,4,2,5,3,2);
sort($tomb);
print_r($tomb);*/


//asort arsort
/*$tomb2=array(
    'kereszt_nev'=>'Dávid',
    'vezetek_nev'=>'Bodor',
);
asort($tomb2);
print_r($tomb2);*/

//ksort krsort
/*$tomb2=array(
    'vezetek_nev'=>'Bodor',
    'kereszt_nev'=>'Dávid',
);
ksort($tomb2);
print_r($tomb2);*/


//natsort

//usort uksort

/*$users = array(
    0 => array(
        'nev' => 'Kiss Anna',
        'email' => 'anna@gmail.com'
    ),
    1 => array(
        'nev' => 'Varga Péter',
        'email' => 'peter@gmail.com'
    ),
    2 => array(
        'nev' => 'Antal Béla',
        'email' => 'bela@gmail.com'
    ),
);


//array_multisort(array_column($users, 'nev'), SORT_ASC, $users);

usort($users, function ($item1, $item2) {
    return $item1['nev'] <=> $item2['nev'];
});


print_r($users);*/











?>