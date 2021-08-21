<?php
namespace App\Base;

class Route {


    public function get($route, $dest)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method !== 'GET'){ return; }

        $struct = self::checkStructure($route, $_SERVER['REQUEST_URI']);

        if($struct){
            $request = self::getParams($route, $_SERVER['REQUEST_URI']);
            $content = self::runControllerAction($dest,$request);
            die();
        }
    }

    public function post($route, $dest)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method !== 'POST'){ return; }

        $struct = self::checkStructure($route, $_SERVER['REQUEST_URI']);

        if($struct){
            $request = self::getParams($route, $_SERVER['REQUEST_URI']);
            $content = self::runControllerAction($dest,$request);
            die();
        }
    }

    private function runControllerAction($dest,$params)
    {
        $goto = explode("@", $dest);

        $controller = $goto[0];
        $action = $goto[1];

        $class = '\\App\\Controllers\\' . $controller;
        $obj = new $class;
        if($obj->needAuth && !Session::isLogined()){
            header('Location: /login');
        }
        echo $obj->$action($params);
        return;
    }

    public static function urlToArray($url1, $url2){

        $a = array_values(array_filter(explode('/', $url1), function($val){ return $val !== ''; }));
        $b = array_values(array_filter(explode('/', $url2), function($val){ return $val !== ''; }));

        return array($a, $b);
    }

    public static function checkStructure($url1, $url2){
        list($a, $b) = self::urlToArray($url1, $url2);

        if(sizeof($a) !== sizeof($b)){
            return false;
        }
        foreach ($a as $key => $value){

            if($value[0] !== ':' && $value !== $b[$key] || $value[0] === ':' && $b[$key][0] === '?'){
                return false;
            }
        }

        return true;
    }

    public static function getParams($url1, $url2){
        list($a, $b) = self::urlToArray($url1, $url2);

        return  Request::setParametrs($a,$b);
    }
}