<?php

class Database {
    
    public $db;
    
    public function __construct ($host, $user, $pass, $db) {
        $this -> db = mysql_connect ($server, $user, $pass);
        if(!$this->db) {
            exit ('no connetc');
        }
        if(!mysql_select_db ($db, $this->db)) {
            exit ('no table');
        }    
        mysql_query("SET NAMES utf8");
        
        return $this->db;
    }
    
    public function get_all_db ($lim) {
        $limit = $lim;
        $sql = "SELECT id, title, content, date FROM articles LIMIT $limit";
        
        $res = mysql_query($sql);
        if(!$res){
            return FALSE;
        }
        for ($i = 0; $i < mysql_num_rows($res); $i++){
            $row[] = mysql_fetch_array($res, MYSQL_ASSOC);
        }
        return $row;
        
    }
    
    public function get_one_db ($id) {
        //echo "get_one_db ".$id;
        $sql = "SELECT id, title, content, date FROM articles WHERE id = '$id'";
        $res = mysql_query ($sql);
        //var_dump ($res);
        if (!$res) {
            return FALSE;
        }
        $row = mysql_fetch_array ($res, MYSQL_ASSOC);
        return $row;
    }
    
    
}

?>