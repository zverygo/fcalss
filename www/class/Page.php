<?php

class Page {
    
    public $text;
    
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
}

?>