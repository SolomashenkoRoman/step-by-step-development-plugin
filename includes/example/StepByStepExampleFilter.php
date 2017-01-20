<?php

/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 20.01.17
 * Time: 12:28 PM
 */

namespace includes\example;

class StepByStepExampleFilter
{
    public function __construct() {
        //Прикрепляем функцию к фильтру
        add_filter('my_filter', array(&$this, 'myFiterFunction'));
        add_filter('my_filter', array(&$this, 'myFiterFunctionAdditionalParameter'), 10 , 3); // 3 - кол. параметров
    }
    public static function newInstance(){
        $instance = new self;
        return $instance;
    }

    /**
     * Функция которую вызовет фильтер
     * @param $str
     * @return string
     */
    public function myFiterFunction( $str ){
        $str = "Hello {$str}";
        return $str;
    }
    /**
     * @param $name
     */
    public function callMyFilter( $name ){
        $name = apply_filters('my_filter', $name);
        //Выводим результат в debug.log
        error_log($name);
    }
    /**
     *  Функция которую вызовет фильтер
     * @param $str
     * @param $data1
     * @param $data2
     * @return string
     */
    public function myFiterFunctionAdditionalParameter( $str, $data1 = "", $data2 = "" ){
        $str = "Hello {$str} {$data1} {$data2}";
        return $str;
    }

    public function callMyFilterAdditionalParameter( $name, $data1, $data2 ){
        $name = apply_filters('my_filter', $name, $data1, $data2);
        //Выводим результат в debug.log
        error_log($name);
    }


}