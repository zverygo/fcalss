<?php
session_start ();
class User {
    
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

// ----- РАБОТА С ПОЛЬЗОВАТЕЛЯМИ ------------ 
    
    public function get_reg_user ($email, $password) {
        // -- проверяем есть ли пользователь в базе, если n > 0, то есть
        $em_arr = "SELECT id_user FROM users WHERE email = '$email' ";
        $r = mysql_query($em_arr);
        $n = mysql_num_rows($r);
        
        if ($n == 0){
            $role = "user";
            $date_reg = date ('y-m-d');
            $password = md5($password); // шифруем пароль перед записью в базу
            $sql = "INSERT INTO users (email, password, role, date_reg) VALUE ('$email', '$password', '$role', '$date_reg')";
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
            $pw = "SELECT password, role FROM users WHERE email = '$email'";
            $res = mysql_query ($pw);
            $row = mysql_fetch_array ($res);
            $pass = $row['password'];
            if(md5($password) == $pass){
                //session_start (); // если залогинились то открываем сессию и записываем в нее пароль и логин
                $_SESSION ["login"] = $email;
                $_SESSION ["role"] = $row['role'];
                $_SESSION ["id_user"] = $row['id_user'];
                return header ("Location: ../index.php");
            }
            else {
                
                echo "неверный пароль"."<br>";
            }
        }
        
    }
    
    public function get_all_user_db ($lim) {
        $sql = "SELECT * FROM users ORDER BY id_user DESC LIMIT $lim";
        $res = mysql_query($sql);
        if(!$res){
            return FALSE;
        }
        for ($i = 0; $i < mysql_num_rows($res); $i++){
            $row[] = mysql_fetch_array($res, MYSQL_ASSOC);
        }
        return $row;
    
    }
}
?>