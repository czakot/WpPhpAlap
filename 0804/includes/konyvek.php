<?php
    include('library/class.genres.php');
    $genres = new genres($connection);

    $params = array();
    $genreList = $genres->get_list($params);
    echo("Idáig elért");
?>
<script>
    let genres = 'Műfaj: <select class="genre_id"><?php if(!empty($genreList)){ foreach($genreList as $item){ echo '<option value="'.$item["id"].'">'.$item["name"].'</option>'; } } ?></select><br>';
</script>
<script src="js/konyvek.js"></script>
<h1>Könyvek</h1>
<form action="">
    Név: <input type="text" name="filter_name" id="filter_name">
    <button onclick="javascript: get_list();">Szűrés</button>
</form>
<a href="javascript: newItem();" title="Új könyv létrehozása"><i class="fas fa-edit"></i></a>
 <div id="popup-form">
     <b>Új könyv felvitele</b>
     <form>
         <input type="hidden" name="popup_id" id="popup_id" value="0">
         Név: <input type="text" name="popup_name" id="popup_name">
         <br>
         <br>
         Bemutatás:<br>
         <textarea id="popup_lead"></textarea>
         <br>
         <b>Műfajok</b> <a href="javascript: add_genre_row()">+</a>
         <div id="genres"></div>
         <br>
         <b>Szerzők</b> <a href="javascript: add_author_row()">+</a>
         <div id="authors"></div>
         <br>
         <br>
         <button onclick="javascipt: closePopup();">Bezárás</button>
         <button onclick="javascipt: save();">Mentés</button>
     </form>
 </div>
<div id="list"></div>