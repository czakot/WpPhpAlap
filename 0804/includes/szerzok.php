<?php
include('library/class.authors.php');
$authors = new authors($connection);

$params = array();
$params["orderby"] = "name";
$authorList = $authors->get_list($params);
//print_r($authorList);
?>
<h1>Szerzők</h1>
<a href="?menu=szerzo" title="új szerző létrehozása"><i class="fas fa-edit"></i></a>
<a href="?menu=szerzoimport" title="szerző importálás"><i class="fas fa-edit"></i></a>
<div id="list">
    <div class="grid-row">
        <div>Szerző</div>
        <div>Könyvek száma</div>
        <div></div>
        <div class="muvelet">

        </div>
    </div>
    <?php
        if(!empty($authorList)){
            foreach($authorList as $authorItem){
                echo '<div class="grid-row">
                    <div>'.$authorItem["name"].'</div>
                    <div>0</div>
                    <div></div>
                    <div class="muvelet">
                        <a href="?menu=szerzo&szerzo_id='.$authorItem["id"].'"><i class="fas fa-edit"></i></a>
                        <a href="#"><i class="fas fa-trash"></i></a>
                    </div>
                </div>';
            }
        }
    ?>
</div>