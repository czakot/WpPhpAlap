<?php
    class qmysql extends mysqli {

        public static function get_connection($params) {
            return new qmysql($params["host"], $params["user"], $params["pass"], $params["db"], '', 'utf8', $params["collation"]);
        }

        public function __construct($host, $user, $pass, $database, $port='', $encoding='utf8', $collation='utf8_general_ci'){
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->database = $database;
            $this->port = $port;
            $this->encoding = $encoding;
            $this->collation = $collation;
            parent::__construct($host,$user,$pass,$database);
            $this->query("SET NAMES {$this->encoding}");
            $this->query("SET CHARACTER SET {$this->encoding}");
            $this->query("SET collation_connection {$this->collation}");
        }

        public function query($query, $resultmode = NULL){
            return parent::query($query,$resultmode);
        }

        public function query_array($query){
            $arr = array();
            $res = $this->query($query);
            while($row = $res->fetch_assoc()){
                $arr[] = $row;
            }
            return $arr;
        }

        public function query_first_row($query){
            return $this->query($query)->fetch_assoc();
        }
    }
