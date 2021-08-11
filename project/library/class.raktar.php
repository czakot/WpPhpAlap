<?php
    class raktar {
    //ide tedd a __construct-ot és add át neki a $connection-t
        public function __construct($connection) {
            $this->connection = $connection;
        }

    //írd meg a get_list metódust, bemenetnek használj $params tömböt és legyen egy where mezője amiből generálod a where feltételt
        public function get_list($params) {
            $sql = "SELECT * FROM raktar";
            if (isset($params["where"]) && strlen($params["where"]) > 0) {
                $sql .= " WHERE ".$params["where"];
            }
            return $this->connection->query_array($sql.";");
        }

    //írd meg a save metódust
    //ha a kapott id 0 akkor INSERT ha nagyobb mint 0 akkor UPDATE legyen
        public function save($params) {
            $sql = "";
            if (isset($params["id"]) && $params["id"] > 0) {
                $sql = "UPDATE raktar SET name = '{$params["name"]}', azonosito = '{$params["azonosito"]}' WHERE id = {$params["id"]};";
            } else {
                $sql = "INSERT INTO raktar (name, azonosito) VALUES ('{$params["name"]}', '{$params["azonosito"]}')";
            }
            return $this->connection->query($sql);
        }

    //írd meg a load_item_by_id metódust, bemeneti paraméternek használj tömböt, a $params["id"]-t tedd a lekérésbe WHERE feltételbe. A kapott tömböt add vissza
        public function load_item_by_id($params) {
            return $this->connection->query_first_row("SELECT * FROM raktar WHERE id = {$params["id"]}");
        }

    //írd meg a delete metódust, törölje a kapott bemenő id alapján a sort az adatbázisból
        public function delete($id) {
            return $this->connection->query("DELETE FROM raktar WHERE id = {$id};");
        }
    }
