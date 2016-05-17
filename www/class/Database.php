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

// ----- РАБОТА СО СТАТЬЯМИ ------------    
    
    public function get_all_db ($lim) {
        $sql = "SELECT id, title, content, date FROM articles ORDER BY id DESC LIMIT $lim";
        
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
        $sql = "SELECT id FROM articles";
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
    
// ----- РАБОТА С ПОЛЬЗОВАТЕЛЯМИ ------------ 
    
    public function get_reg_user ($email, $password) {
        // -- проверяем есть ли пользователь в базе, если n > 0, то есть
        $em_arr = "SELECT id_user FROM users WHERE email = '$email' ";
        $r = mysql_query($em_arr);
        $n = mysql_num_rows($r);
        
        if ($n == 0){
            $password = md5($password); // шифруем пароль перед записью в базу
            $sql = "INSERT INTO users (email, password) VALUE ('$email', '$password')";
            $res = mysql_query ($sql);
            if(!$res)
                return FALSE;
            return header ("Location: ../reg/reg.php");
        }        
        else {
            echo "пользователь уже существует";
        }
    }
    
    public function get_log_user ($email, $password){
        // ---- прверка существует ли пользователь -- 
        $em_arr = "SELECT email FROM users WHERE email = '$email' ";
        $r = mysql_query ($em_arr);
        $n = mysql_num_rows ($r);
        if ($n == 0) {
            echo "пользователь не существует"."<br>";
        } 
        // --- если есть проверяем пароль ---
        else{
            $pw = "SELECT password FROM users WHERE email = '$email'";
            $res = mysql_query ($pw);
            $row = mysql_fetch_array ($res);
            $pass = $row['password'];
            if(md5($password) == $pass){
                
                session_start (); // если залогинились то открываем сессию и записываем в нее пароль и логин
                $_SESSION ["login"] = $email;
                $_SESSION ["pass"] = $row['password'];
                
                return header ("Location: ../index.php");
            }
            else {
                echo "неверный пароль"."<br>";
            }
        }
        
    }
    
}

?>