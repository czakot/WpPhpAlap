<?php

$elso_tomb = array('elso','második',3);
//echo $elso_tomb."<br>;
//print_r($elso_tomb);

$masodik_tomb =array();
//print_r($masodik_tomb);

$harmadiktomb[]='213';
//print_r($harmadiktomb);

$harmadiktomb[]='214';
//print_r($harmadiktomb);

$harmadiktomb = array('214');
//print_r($harmadiktomb);

$masodik_tomb[] = 5;
//print_r($masodik_tomb);

//indexek
$negyedik[1]=0;
$negyedik[2]=2;
$negyedik[6]=6;
$negyedik[4]=4;
//print_r($negyedik);

$negyedik[6]=5;
//print_r($negyedik);

$elso_tomb[1]=11;
//print_r($elso_tomb);

$negyedik[] = 12;
//print_r($negyedik);

$negyedik['nev']='Dávid';
//print_r($negyedik);

//uj tömb
$otodik_tomb= array(
    'elso' => 'első érték',
    'masodik' => 'második érték',
    'harmadik' => 'második érték',
);
//print_r($otodik_tomb);

//tömbok értékeinek hazsnálata

//echo $otodik_tomb['elso'].'<br>';
//echo $otodik_tomb['első érték'];

//
$x='uj_elem_inxed';
$otodik_tomb[$x] = 'uj elem';
//print_r($otodik_tomb);

$x='uj_elem_inxed';
$y='y érték';
$otodik_tomb[$x] = $y;
//print_r($otodik_tomb);

$y='Y módosított érték';
//print_r($otodik_tomb);

//több dimenziós tömbök
$multi_array=array();
//print_r($multi_array);

$multi_array[0]=$otodik_tomb;
$multi_array[1]=$negyedik;
$multi_array[2][]="szöveges érték";
//print_r($multi_array);

//print_r($multi_array[0]);
//print_r($multi_array[0]['elso']).'<br>';
//print_r($multi_array[2][4]);

$uj_var = $multi_array[0]['elso'].$multi_array[1]['nev'];
////echo $uj_var;

//print_r($multi_array[2]);

$m_array['A']=array(
    1 => 'A1',
    2 => 'A2',
    3 => 'A3',
    10 => 'A10',
);

$m_array['B'][1]= 'B1';
$m_array['B'][2]= 'B2';
$m_array['B'][3]= 'B3';

$m_array['C'][18]= 'C1';
$m_array['C'][]= 'C2';
$m_array['C'][]= 'C3';

//print_r($m_array);
//print_r($m_array['A'][3]);
//print_r($m_array['B'][2]);

//több dimenziós tömb
$m_array['A'][1] =array(1,2,3,4);
$m_array['A'][2] =array(1,2,3,4);
$m_array['A'][3] =array(1,2,3,4);
//print_r($m_array);

//print_r($m_array['A'][1][3]);
$m_array['A']['AA']=13;
print_r($m_array);















?>