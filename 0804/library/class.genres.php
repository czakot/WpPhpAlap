<?php
class genres
{
    public function __construct($connection){
        $this->connection = $connection;
    }
    public function get_list($params){
        $list = $this->connection->query_array("SELECT * FROM genres ORDER BY name");
        return $list;
    }
    public function save($params){
        $ret = array();
        $genreData = $params["genreData"];
        if(!empty($genreData)){
            if(isset($genreData["id"]) && $genreData["id"] > 0){
                //módosítás
                //UPDATE genres SET name = 'valami' WHERE id = 1
                $query = "UPDATE genres SET ";
                    $i = 0;
                    foreach($genreData as $key => $geneItem){
                        if($key != "id"){
                            if($i > 0){ $query .= ","; }
                            $query .= $key." = '".$geneItem."'";
                            $i++;
                        }
                    }
                $query .= " WHERE id = ".$genreData["id"];
                    $this->connection->query($query);
            } else {
                //újként mentés
                //INSERT INTO genres (name) VALUES ('valami');
                $query = "INSERT INTO genres (";
                   $i = 0;
                   foreach($genreData as $key => $geneItem){
                       if($key != "id"){
                           if($i > 0){ $query .= ","; }
                           $query .= $key;
                           $i++;
                       }
                   }
                $query .= ") VALUES (";
                    $i = 0;
                    foreach($genreData as $key => $geneItem){
                        if($key != "id"){
                            if($i > 0){ $query .= ","; }
                            $query .= "'".$geneItem."'";
                            $i++;
                        }
                    }
                $query .= ")";
                $this->connection->query($query);
            }
        }
        return $ret;
    }

    public function load_item_by_id($params){
        $genreData = $this->connection->query_first_row("SELECT * FROM genres WHERE id = ".$params["id"]);
        return $genreData;
    }

    public function delete($params){

        $this->connection->query("DELETE FROM genres WHERE id = ".$params["id"]);
    }
}