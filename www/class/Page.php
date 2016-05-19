<?php

class Page {
    
    public $text;

// ----- РАБОТА СО СТАТЬЯМИ ------------      
    
    // возвращает все статьи
    public function get_all ($lim) {
        $db = new Database (HOST, USER, PASS, DB);
        $result = $db -> get_all_db($lim);
        
        return $result;
        
    }
    
    // возвращает одну статью, согласно передаваемому ID
    public function get_one ($id) {
        //echo "<br>get_one ".$id."<br>";
        
        $db = new Database (HOST, USER, PASS, DB);
        $result = $db -> get_one_db($id);
        
        return $result;        
    }
    
    // возвращает тело страницы
    public function get_body ($text, $file) {
        ob_start ();
        include $file.'.php';
        return ob_get_clean();
    }
    
    public function get_new ($title, $content) {
        $db = new Database (HOST, USER, PASS, DB);
        $result = $db -> get_new_db ($title, $content);
    }
    
    public function get_edit ($id, $title, $date, $content) {
         $db = new Database (HOST, USER, PASS, DB);
         $result = $db -> get_edit_db ($id, $title, $date, $content);       
    }
    
    public function get_del ($id) {
        $db = new Database (HOST, USER, PASS, DB);
        $result = $db -> get_del_db ($id);
    }
    
// ----- РАБОТА С ПОЛЬЗОВАТЕЛЯМИ ------------   
    
    public function get_reg ($email, $password) {
        $db = new Database (HOST, USER, PASS, DB);
        $result = $db -> get_reg_user ($email, $password);
        
    }
    
    public function get_log ($email, $password) {
        $db = new Database (HOST, USER, PASS, DB);
        $result = $db -> get_log_user ($email, $password);
        
    }
    
    public function get_all_user ($lim) {
        $db = new Database (HOST, USER, PASS, DB);
        $result = $db -> get_all_user_db ($lim);
        
        return $result;
    }
    
}

?>