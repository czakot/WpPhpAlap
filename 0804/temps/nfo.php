<?php
//echo $_SERVER["DOCUMENT_ROOT"];
//echo phpinfo();
//echo realpath(dirname(__FILE__));
//echo $_SERVER["REQUEST_URI"];
$urlArr = explode("/",$_SERVER["REQUEST_URI"]);
echo $urlArr[1];