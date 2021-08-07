<?php
class books {
    public function __construct($connection){
        $this->connection = $connection;
    }
    public function get_list($params){

        $where = '';
        if(isset($params["where"]) && strlen($params["where"]) > 0){
            $where = " WHERE name LIKE '%".$params["where"]."%'";
        }
        $list = $this->connection->query_array("SELECT * FROM books".$where);

        return $list;
    }
    public function save($params){
        $bookData = $params["bookData"];
        if(isset($bookData) && $bookData["id"] > 0){
            //módosítás
            $query = "UPDATE books SET ";
                $i = 0;
                foreach($bookData as $key => $bookItem){
                    if($key != "id"){
                        if($i > 0){ $query .= ","; }
                        $query .= $key."='".$bookItem."'";
                        $i++;
                    }
                }
            $query .= " WHERE id = ".$bookData["id"];
                $this->connection->query($connection);

                $this->connection->query("DELETE FROM book_genre WHERE book_id = ".$bookData["id"]);
            if(isset($params["genreArr"]) && !empty($params["genreArr"])){
                foreach($params["genreArr"] as $genreID){
                    $this->connection->query("INSERT INTO book_genre (book_id,genre_id) VALUES (".$bookData["id"].",$genreID)");
                }
            }

            $this->connection->query("DELETE FROM book_author WHERE book_id = ".$bookData["id"]);
            if(isset($params["authorArr"]) && !empty($params["authorArr"])){
                foreach($params["authorArr"] as $authorID){
                    $this->connection->query("INSERT INTO book_author (book_id,author_id) VALUES (".$bookData["id"].",$authorID)");
                }
            }
        } elseif(isset($bookData) && $bookData["id"] == 0){
            //újként mentés
            $query = "INSERT INTO books (";
                $i = 0;
                foreach($bookData as $key => $bookItem){
                    if($key != "id"){
                        if($i > 0){ $query .= ","; }
                        $query .= $key;
                        $i++;
                    }
                }
            $query .= ") VALUES (";
                $i = 0;
                foreach($bookData as $key => $bookItem){
                    if($key != "id"){
                        if($i > 0){ $query .= ","; }
                        $query .= "'".$bookItem."'";
                        $i++;
                    }
                }
            $query .= ")";
                $this->connection->query($query);

                $bookIdArr = $this->connection->query_first_row("SELECT LAST_INSERT_ID()");
                $bookID = $bookIdArr["LAST_INSERT_ID()"];

            if(isset($params["genreArr"]) && !empty($params["genreArr"])){
                foreach($params["genreArr"] as $genreID){
                    $this->connection->query("INSERT INTO book_genre (book_id,genre_id) VALUES ($bookID,$genreID)");
                }
            }
            if(isset($params["authorArr"]) && !empty($params["authorArr"])){
                foreach($params["authorArr"] as $authorID){
                    $this->connection->query("INSERT INTO book_author (book_id,author_id) VALUES ($bookID,$authorID)");
                }
            }
        }
    }
}