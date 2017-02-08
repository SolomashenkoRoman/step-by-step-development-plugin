<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 08.02.17
 * Time: 9:47 PM
 */

namespace includes\common;


class StepByStepRequestApi
{
    private static $instance = null;
    private function __construct(){

    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}