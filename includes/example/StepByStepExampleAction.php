<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 20.01.17
 * Time: 1:33 PM
 */

namespace includes\example;


class StepByStepExampleAction
{
    public function __construct() {
        //Прикрепим функцию к событию 'my_action'
        add_filter('my_action', array(&$this, 'myActionFunction'));
    }
    public static function newInstance(){
        $instance = new self;
        return $instance;
    }

    /**
     * Функция события my_action
     */
    public function myActionFunction(){
        //Выводим сообщение в debug.log
        error_log("my_action call");
    }

    public function callMyAction(){
        // Вызов самого события.
        do_action('my_action');
    }
}