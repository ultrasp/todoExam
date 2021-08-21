<?php
namespace App\Base;

class Request {

    private $params;
    private $query;
    private $inputs;
    private $flashMessages;

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }

    public function getParam($name){
        return isset($this->params[$name]) ? $this->params[$name] : null; 
    }

    public function getQuery($name){
        return isset($this->query[$name]) ? $this->query[$name] : null; 
    }

    public function getInput($name){
        return isset($this->inputs[$name]) ? htmlspecialchars($this->inputs[$name]) : null; 
    }

    public static function setParametrs($urlA, $urlB){
        $item = new self();
        $item->params  = [];
        $item->query  = [];
        $item->inputs  = [];

        foreach($urlA as $key => $value){
            if($value[0] == ':'){
                $param = explode('?', $urlB[$key])[0];
                $item->params[substr($value, 1)] = $param;
            }
        }

        $queryString = explode('?', end($urlB))[1];
        parse_str($queryString, $item->query);

        foreach($_POST as $key => $row){
            $item->inputs[$key] = $row;
        }

        return $item;
    }
}