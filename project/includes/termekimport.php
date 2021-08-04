<?php
    //includold a termek osztályt és példányosítsd
    //ellenőrizd hogy van e $_POST["event"]
    //a szerző import alapján írd meg az XML feldolgozást, a minta file-t a temp mappában megtalálod
?>

<h1>Termékimport</h1>
<br>
<br>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="event" value="do_import">
    Importfájl: <input type="file" name="termekimportfile">
    <br>
    <br>
    <br>
    <button>Mentés</button>
</form>

