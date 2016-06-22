<?php
session_start ();
class Admin {
    
    public $adm;
    
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
//////////////////////////////////////
    public function tech_work () {
        $sql = "SELECT value FROM adm_tbl WHERE name = 'tech_work'";
        $res = mysql_query($sql);
        $row = mysql_fetch_array($res);
        
        return $row;        
    }




}