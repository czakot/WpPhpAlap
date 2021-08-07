<?php
    class users {
        public function __construct($connection){
            $this->connection = $connection;
        }
        public function get_list($params=array()){
            $where = '';
            if(isset($params["where"]) && strlen($params["where"]) > 0){
                $where = " WHERE ".$params["where"];
            }
            $list = $this->connection->query_array("SELECT * FROM users $where");
            return $list;
        }
        public function do_login($params){
            $ret = array();
            if(strlen($params["loginname"]) > 0 && strlen($params["password"]) > 0){
                $userItem = $this->connection->query_first_row("SELECT * FROM users WHERE name = '".$params["loginname"]."'");
                if($userItem["id"] > 0){
                    //jelszó ellenőrzés
                    if(password_verify($params["password"],$userItem["password"])){
                        //sikeres belépés
                        $ret = $userItem;
                    } else {
                        //sikertelen
                        $ret["err"] = "Hibás jelszó.";
                    }
                } else {
                    //sikertelen
                    $ret["err"] = "Nincs ilyen loginnevű felhasználó.";
                }
            } else {
                $ret["err"] = 'Hibás bejelentkezés';
            }
            return $ret;
        }
        public function delete($params){
            $ret = array();

            if(isset($params["user_id"]) && intval($params["user_id"]) > 0) {
                $this->connection->query("DELETE FROM users WHERE id = " . $params["user_id"]);
                //echo "DELETE FROM users WHERE id = " . $params["user_id"];
                $ret["err"] = "sikeres törlés";
            } else {
                $ret["err"] = "nem adtál meg felhasználó ID-t.";
            }

            return $ret;
        }
        public function save($params){
            $ret = array();
            $userData = $params["userData"];
            if(isset($userData) && $userData["id"] == 0){
                //újként mentjük
                $temp = $this->connection->query_first_row("SELECT * FROM users WHERE email = '".$userData["email"]."'");
                if(isset($temp["id"]) && intval($temp["id"]) > 0){
                    $ret["err"] = "Már létezik ez emailcím az adatbázisban.";
                } else {
                    //jelszó készítést
                    $pwd = password_hash($userData["pwd"], PASSWORD_BCRYPT);
                    $this->connection->query("INSERT INTO users (name,right_id,email,password) VALUES ('".$userData["name"]."',".intval($userData["right_id"]).",'".$userData["email"]."','".$pwd."')");
                    $ret["err"] = "sikeres felvitel";
                }
            } elseif(isset($userData) && $userData["id"] > 0){
                //módosítás
                $temp = $this->connection->query_first_row("SELECT * FROM users WHERE email = '".$userData["email"]."' AND id <> ".$userData["id"]);
                if(isset($temp["id"]) && intval($temp["id"]) > 0){
                    $ret["err"] = "Ez az emailcím már másnál szerepel";
                } else {
                    $this->connection->query("UPDATE users SET name = '".$userData["name"]."', email = '".$userData["email"]."', right_id = ".$userData["right_id"]." WHERE id = ".$userData["id"]);
                    $ret["err"] = "sikeres módosítás";
                }
            } else {
                //hiba
            }
            return $ret;
        }
        public function load_item_by_id($params){
            if(isset($params["id"]) && $params["id"] > 0) {
                $userData = $this->connection->query_first_row("SELECT * FROM users WHERE id = " . intval($params["id"]));
            }
            return $userData;
        }
    }
?>