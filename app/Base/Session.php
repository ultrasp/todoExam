<?php
namespace App\Base;

class Session {

    public static function storeMessage($key,$message){
        $_SESSION['alerts'][$key] = $message;
    }

    public static function getFlashMessages(){
        $mes= isset($_SESSION['alerts']) ? $_SESSION['alerts'] : [];
        self::flash('alerts');
        return $mes;
    }


    public static function storeErrorForm($errors,$data=[]){
        $_SESSION['form'] = [
            'errors' => $errors,
            'data' => $data
        ];
    }

    public static function getErrorForm(){
        $temp = isset($_SESSION['form']) ?  $_SESSION['form'] : null;
        self::flash();
        return $temp;
    }

    public static function flash($key = 'form'){
        unset($_SESSION[$key]);   
    }

    public static function clear(){
       session_destroy();
    }

    public static function logined($id){
        $_SESSION['auth_id'] = $id;
    }

    public static function isLogined(){
        return isset($_SESSION['auth_id']) && $_SESSION['auth_id'];
    }

}