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
    // какой-то лютый пиздец, который возвращает количество статей
    public function get_num_row_db () {
        $sql = "SELECT id date FROM articles";
        $res = mysql_query($sql);
        $num_row = mysql_num_rows($res);
        return $num_row;
        
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
    // метод добавления новой статьи
    public function get_new_db ($title, $date, $content) {
        
        $sql = "INSERT INTO articles (title, date, content) VALUES ('$title', '$date', '$content')"; //добавить экранирование значений
        $res = mysql_query ($sql);
        
        if (!$res) {
            return FALSE;
        }
        return header ("Location: ../admin/admin.php"); //возвращаемся в админ панель
        
    }
    //метод для редактирования существующей статьи
    public function get_edit_db ($id, $title, $date, $content) {
        $sql = "UPDATE articles SET title='$title', content='$content', date='$date' WHERE id='$id'";
        $res = mysql_query ($sql);
        if (!$res)
            return FALSE;
        return header ("Location: ../admin/admin.php");
    }
    // метод для удаления статьи
    public function get_del_db ($id) {
        
        $sql = "DELETE FROM articles WHERE id='$id'";
        $res = mysql_query ($sql);
        if (!$res) {
            return FALSE;
        }
        return header ("Location: ../admin/admin.php");
    }
    
}

?>