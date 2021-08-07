<?php
class authors
{
    public function __construct($connection){
        $this->connection = $connection;
    }
    public function get_list($params){

        $orderby = "";
        if(isset($params["orderby"]) && strlen($params["orderby"]) > 0){
            $orderby = "ORDER BY ".$params["orderby"];
        }
        $where = "";
        if(isset($params["where"]) && strlen($params["where"]) > 0){
            $where = " WHERE ".$params["where"];
        }
        //echo "SELECT * FROM authors $where ".$orderby;
        $list = $this->connection->query_array("SELECT * FROM authors $where ".$orderby);
        return $list;
    }
    public function delete($params){

    }
    public function save($params){
        $ret = array();
        $authorData = $params["authorData"];
        if(!empty($authorData)){
            if(isset($authorData["id"]) && $authorData["id"] > 0){
                //print_r($authorData);
                //módosítás
                $query = "UPDATE authors SET ";
                    $i = 0;
                    foreach($authorData as $key => $authorItem){
                        if($key != "id"){
                            if($i > 0){ $query .= ","; }
                            $query .= $key." = '".$authorItem."'";
                            $i++;
                        }
                    }
                $query .= " WHERE id = ".intval($authorData["id"]);
                    //echo $query;
                $this->connection->query($query);
            } else {
                //újként mentés
                $query = "INSERT INTO authors (";
                    //meghatározzuk a mező neveket
                    $i = 0;
                    foreach($authorData as $key => $authorItem){
                        if($key != "id"){
                            if($i > 0){ $query .= ","; }
                            $query .= $key;
                            $i++;
                        }
                    }
                $query .= ") VALUES (";
                    //beszúrjuk az értékeket
                    $i = 0;
                    foreach($authorData as $key => $authorItem){
                        if($key != "id"){
                            if($i > 0){ $query .= ","; }
                            $query .= "'".$authorItem."'";
                            $i++;
                        }
                    }
                $query .= ")";
                    //echo $query;
                $this->connection->query($query);
            }
        }
        return $ret;
    }
    public function load_item_by_id($params){
        $userData = array();

        if(isset($params["id"]) && $params["id"] > 0){
            $userData = $this->connection->query_first_row("SELECT * FROM authors WHERE id = ".intval($params["id"]));
        }

        return $userData;
    }
}
?>