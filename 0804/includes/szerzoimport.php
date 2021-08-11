<?php
    include('library/class.authors.php');
    $authors = new authors($connection);
    if(isset($_POST["event"]) && $_POST["event"] == "do_import"){
        //echo $_FILES["importfile"]["tmp_name"];
        if(is_file($_FILES["importfile"]["tmp_name"])) {
            $xmlcontent = file_get_contents($_FILES["importfile"]["tmp_name"]);
            $xmlArr = simplexml_load_string($xmlcontent);
//            $xmlArr = simplexml_load_file($_FILES["importfile"]["tmp_name"]);
            print_r($xmlArr);
            if(!empty($xmlArr)){
                foreach($xmlArr->szerzo as $item){
                    $params = array();
                    $params["authorData"]["name"] = $item->nev;
                    $params["authorData"]["age"] = $item->kor;
                    $authors->save($params);
                }
            }
        }
    }

?>
<h1>Szerző import</h1>
<br>
<br>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="event" value="do_import">
    Import XML: <input type="file" name="importfile">
    <br>
    <br>
    <br>
    <button>Mentés</button>
</form>

