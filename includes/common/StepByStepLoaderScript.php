<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 05.02.17
 * Time: 5:02 PM
 */

namespace includes\common;


class StepByStepLoaderScript
{
    private static $instance = null;

    private function __construct(){
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin' ) );
            add_action('admin_head', array(&$this, 'loadHeadScriptAdmin'));
        } else {
            add_action( 'wp_enqueue_scripts', array(&$this, 'loadScriptSite' ) );
            add_action('wp_head', array(&$this, 'loadHeadScriptSite'));
            add_action( 'wp_footer', array(&$this, 'loadFooterScriptSite'));
        }

    }

    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function loadScriptAdmin($hook){}
    public function loadHeadScriptAdmin(){}
    public function loadScriptSite($hook){}
    public function loadHeadScriptSite(){}
    public function loadFooterScriptSite(){}
}