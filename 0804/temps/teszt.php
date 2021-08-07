<?php
$pwd = 'teszt';

$pwd = password_hash($pwd, PASSWORD_BCRYPT);

echo $pwd;
?>