<?php
    class users {
        public function __construct($connection){
            //ez az osztály konstruktora, itt határozzuk meg az alapvető tulajdonságokat
            $this->connection = $connection;
        }
        public function get_list($params=array()){
            //get_list metódus, visszaad egy listát a users táblából a feltételek alapján
            $where = '';
            if(isset($params["where"]) && strlen($params["where"]) > 0){
                $where = " WHERE ".$params["where"];
            }
            $list = $this->connection->query_array("SELECT * FROM users $where");
            return $list;
        }
        public function do_login($params){
            //login metódus, ha sikeres akkor visszaadja a felhasználó adatait, ha nem akkor hibaüzenetet
            $ret = array();
            if(strlen($params["loginname"]) > 0 && strlen($params["password"]) > 0){ // ha van loginname és password
                $userItem = $this->connection->query_first_row("SELECT * FROM users WHERE name = '".$params["loginname"]."'"); //lekérjük a loginname alapján az adatokat
                if($userItem["id"] > 0){ //ha találtunk
                    //jelszó ellenőrzés
                    if(password_verify($params["password"],$userItem["password"])){ //password hash ellenőrzése
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
            //delete metódus, ami törli a users táblából a felhasználót
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
            //save metódus ami ha a kapott id = 0 akkor újként menti, ha nagyobb mint 0 akkor módosítja
            $ret = array();
            $userData = $params["userData"];
            if(isset($userData) && $userData["id"] == 0){
                //újként mentjük
                $temp = $this->connection->query_first_row("SELECT * FROM users WHERE email = '".$userData["email"]."'"); //ellenőrizzük hogy van e már ilyen email cím az adatbázisban
                if(isset($temp["id"]) && intval($temp["id"]) > 0){
                    $ret["err"] = "Már létezik ez emailcím az adatbázisban.";
                } else {
                    $this->connection->query("INSERT INTO users (name,right_id,email) VALUES ('".$userData["name"]."',".intval($userData["right_id"]).",'".$userData["email"]."')");
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
    }
?>