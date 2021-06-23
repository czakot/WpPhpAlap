<?php
//MATH functions

//abs() //abszolút értéket adja vissza
/*echo abs(2);
echo '<br>'.abs(-2.35);*/

//cos() sin() tan(); ... szinusz koszinusz.. trigonometria műveletekhez

//base_convert számrendszerek közti váltás
//echo base_convert(15,10,2);

//ceil(); felfelé kerekítés
//echo ceil(5.4);

//floor(); lefelé kerekít
//echo floor(5.4);

//fmod maradék
//echo fmod(5,3);
//echo '<br>'.(5%3);

//min() a tömb legkisebb elemét adja vissza
//echo min(array(1,4,7,6,0));

//max() a t öbm legnagoybb elemét adja vissaz
//echo max(array(1,4,7,6,0));

//mt_rand()
/*echo(mt_rand() . "<br>");
echo(mt_rand() . "<br>");
echo(mt_rand(10,100)).'<br>';
echo mt_getrandmax();*/

//pi() 

//pow() az elsőt a második paraméterre emeli


//round() //kerekítés
//echo round(5.645343675,3);



//EGYÉB functions
/*echo 'sdfkjh';
//die();
echo round(5.645343675,3);
die('üzenet'); //futás vége
echo round(5.645343675,3);*/

//eval(); //php kódként lefuttatja a stringet(kerüljük)
/*$string = 'echo "eval teszt";';
eval($string);*/

//sleep(); //megállítja a futást (mp)
/*sleep(10);
echo 'teszt';*/

//empty, unset isset var_dump print_r()

$string='dfsd';
var_dump($string);
echo isset($string).'<br>';
unset($string);
var_dump($string);
echo isset($string).'<br>';



?>