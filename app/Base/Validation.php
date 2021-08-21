<?php
namespace App\Base;

class Validation {


    private static $errors = []; 

    public static function validateFuncList(){
        return [
            'required' => 'checkRequired',
            'email'=> 'checkEmail'
        ];
    }

    public static function validationErrorLabels(){
        return [
            'required' => 'Field is required',
            'email' => 'Incorrect email format'
        ];
    }

    public static function getErrorLabel($rule){
        return self::validationErrorLabels()[$rule] ?? 'Validation error';
    }

    public static function validate($rules, $request)
    {
        $is_valid = true;
        foreach ($rules as $key => $value) {
            $rules = explode("|", $value);
            foreach($rules as $rule){
                if(self::hasErrorByRule($rule,$request->getInput($key))){
                    self::$errors[$key][] = self::getErrorLabel($rule);
                    $is_valid = false;
                }
            }
        }
        if(!$is_valid)
            Session::storeErrorForm(self::$errors,$_POST);
        return $is_valid;
    }

    public static function getErrors(){
        return self::$errors;
    }


    public static function hasErrorByRule($rule,$value){
        $list = self::validateFuncList();
        $funcName = isset($list[$rule]) ? $list[$rule] :  null;

        if(empty($funcName))
            return true;

        return self::$funcName($value);
        
    }

    public function checkRequired($value){
        return empty($value); 
    }

    public function checkEmail($value){
        return !filter_var($value, FILTER_VALIDATE_EMAIL); 
    }

}