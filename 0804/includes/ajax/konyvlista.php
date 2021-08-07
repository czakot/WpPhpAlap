<?php
    include('header.php');
    include('../../library/class.books.php');
    include('../../library/class.authors.php');
    $books = new books($connection);
    $author = new authors($connection);

    $params = array();
    if(isset($_POST["filter"]) && strlen($_POST["filter"]) > 0){
        $params["where"] = $_POST["filter"];
    }
    $list = $books->get_list($params);

    $response = array();
    $response["success"] = true;

    //fejléc
    $response["htmllist"] = '<div class="grid-row">
        <div>cím</div>
        <div>szerző(k)</div>
        <div>műfaj(ok)</div>
        <div></div>
        <div class="muvelet"></div>
    </div>';

    if(!empty($list)){
        //book_id IN (1,5,8);
        $inString = "";
        foreach($list as $item){
            if(strlen($inString) > 0){ $inString .= ","; }
            $inString .= $item["id"];
        }
        $bookAuthIndex = array();
        $authorIndex = array();
        if(strlen($inString) > 0){
            $bookAuthArr = $connection->query_array("SELECT * FROM book_author WHERE book_id IN ($inString)");
            $authInString = "";
            if(!empty($bookAuthArr)){
                foreach($bookAuthArr as $item){
                    $bookAuthIndex[$item["book_id"]][] = $item;
                    if(strlen($authInString) > 0){ $authInString .= ","; }
                    $authInString .= $item["author_id"];
                }
            }
            unset($bookAuthArr);
            if(strlen($authInString) > 0){
                $params = array();
                $params["where"] = "id IN ($authInString)";
                $authorList = $author->get_list($params);
                foreach($authorList as $authorItem){
                    $authorIndex[$authorItem["id"]] = $authorItem;
                }
                unset($authorList);
            }
        }
//print_r($authorIndex);
//print_r($bookAuthIndex);
        foreach($list as $item){
            $szerzok = '';
            if(!empty($bookAuthIndex[$item["id"]])) {

                $authorBook = $bookAuthIndex[$item["id"]]; //SELECT * FROM book_author WHERE book_id = $item["id"]
                //print_r($bookAuthIndex[$item["id"]]);
                if (!empty($authorBook)) {
                    foreach ($authorBook as $connectItem) {
                        //print_r($connectItem);
                        $authorData = $authorIndex[$connectItem["author_id"]]; //SELECT * FROM authors WHERE id = $connectItem["author_id"]
                        //print_r($authorData);
                        if (strlen($szerzok) > 0) {
                            $szerzok .= ", ";
                        }
                        $szerzok .= $authorData["name"];
                    }
                }
            }
            $response["htmllist"] .= '<div class="grid-row">
        <div>'.$item["name"].'</div>
        <div>'.$szerzok.'</div>
        <div></div>
        <div></div>
        <div class="muvelet">
            <a href="javascript: modify(\''.$item["id"].'\');" title="Módosítás"><i class="fas fa-edit"></i></a>
            <a href="javascript: deleteItem(\''.$item["id"].'\');" title="Törlés"><i class="fas fa-trash"></i></a>
        </div>
    </div>';
        }
    }
/*echo '<pre>';
    print_r($response);
echo '</pre>';*/
    echo json_encode($response);