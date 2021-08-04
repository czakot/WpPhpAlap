<?php
    class qmysql extends mysqli {
        public function __construct($host,$user,$pass,$database,$port='',$encoding='utf8',$collation='utf8_general_ci'){
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
        public function query($query,$resultmode=NULL){
            $res = parent::query($query,$resultmode);
            return $res;
        }
        public function query_array($query){
            $arr = array();
            $res = $this->query($query);
            while($row=$res->fetch_assoc()){
                $arr[] = $row;
            }
            return $arr;
        }
        public function query_first_row($query){
            $row = array();
            $res = $this->query($query);
            $row=$res->fetch_assoc();
            return $row;
        }
    }
?>