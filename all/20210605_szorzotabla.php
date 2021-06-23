<?php
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

    $tablazat=szorzo_tabla();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $tablazat ?>
</body>
</html>