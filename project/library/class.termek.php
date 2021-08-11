<?php


class termek
{
    //ugyanúgy kell megcsinálni mint a raktar osztályt
    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function get_list($params) {
        $sql = "SELECT * FROM termek";
        if (isset($params["where"]) && strlen($params["where"]) > 0) {
            $sql .= " WHERE ".$params["where"];
        }
        return $this->connection->query_array($sql.";");
    }

    public function save($params) {
        $sql = "";
        if (isset($params["id"]) && $params["id"] > 0) {
            $sql = "UPDATE termek SET name = '{$params["name"]}', "
                    ."cikkszam = '{$params["cikkszam"]}', mertekegyseg_id = '{$params["mertekegyseg_id"]}' "
                ."WHERE id = {$params["id"]};";
        } else {
            $sql = "INSERT INTO termek (name, cikkszam, mertekegyseg_id) "
                ."VALUES ('{$params["name"]}', '{$params["cikkszam"]}', '{$params["mertekegyseg_id"]}')";
        }
        return $this->connection->query($sql);
    }

    public function load_item_by_id($id) {
        return $this->connection->query_first_row("SELECT * FROM termek WHERE id = {$id}");
    }

    public function delete($id) {
        return $this->connection->query("DELETE FROM termek WHERE id = {$id};");
    }
}