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
    const STEPBYSTEP_API_V2 = "http://api.travelpayouts.com/v2";
    const STEPBYSTEP_TOKEN = "b2f8bef81735323aecb33e285da8e694";
    const STEPBYSTEP_MARKER = "17942";
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