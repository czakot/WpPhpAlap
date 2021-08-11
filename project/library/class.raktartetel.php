<?php
class raktartetel
{
    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function get_list($params) {
        $sql = "SELECT * FROM raktartetel";
        if (isset($params["where"]) && strlen($params["where"]) > 0) {
            $sql .= " WHERE ".$params["where"];
        }
        return $this->connection->query_array($sql.";");
    }

    public function save($params) {
        $sql = "";
        if (isset($params["id"]) && $params["id"] > 0) {
            $sql = "UPDATE raktartetel SET termek_id = '{$params["termek_id"]}',raktar_id = '{$params["raktar_id"]}', mennyiseg = '{$params["mennyiseg"]}' WHERE id = {$params["id"]};";
        } else {
            $sql = "INSERT INTO raktartetel (termek_id, raktar_id, mennyiseg) VALUES ({$params["termek_id"]}, {$params["raktar_id"]}, {$params["mennyiseg"]})";
        }
        return $this->connection->query($sql);
    }

    public function load_item_by_id($id) {
        return $this->connection->query_first_row("SELECT * FROM raktartetel WHERE id = {$id}");
    }

    public function delete($id) {
        return $this->connection->query("DELETE FROM raktartetel WHERE id = {$id};");
    }
}