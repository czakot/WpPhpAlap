<?php
include('library/class.genres.php');
$genres = new genres($connection);
//print_r($_GET);
if(isset($_GET["torlendo_mufaj_id"]) && $_GET["torlendo_mufaj_id"] > 0){

    $params = array();
    $params["id"] = $_GET["torlendo_mufaj_id"];
    //$genres->delete($params);

}

$params = array();
$genreList = $genres->get_list($params);
?>
<h1>Műfajok</h1>
<a href="?menu=mufaj" title="új műfaj létrehozása"><i class="fas fa-edit"></i></a>
<div id="list">
    <div class="grid-row">
        <div>Műfaj</div>
        <div></div>
        <div class="muvelet">

        </div>
    </div>
    <?php
        if(!empty($genreList)){
            foreach($genreList as $genreItem){
               echo '<div>'.$genreItem["name"].'</div>
                    <div></div>
                    <div class="muvelet">
                        <a href="?menu=mufaj&mufaj_id='.$genreItem["id"].'"><i class="fas fa-edit"></i></a>
                        <a href="?menu=mufajok&torlendo_mufaj_id='.$genreItem["id"].'"><i class="fas fa-trash"></i></a>
                    </div>';
            }
        }
    ?>
</div>