<?php

/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 16.01.17
 * Time: 6:53 PM
 */
namespace includes;

use includes\common\StepByStepDefaultOption;
use includes\common\StepByStepLoader;
use includes\custom_post_type\BookPostType;
use includes\models\admin\menu\StepByStepGuestBookSubMenuModel;


class StepByStepPlugin
{
    private static $instance = null;

    private function __construct() {
        StepByStepLoader::getInstance();
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));

        // Создаем Custom Post Type Book
        new BookPostType();


    }

    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

    /**
     * Если не созданные настройки установить по умолчанию
     */
    public function setDefaultOptions(){
        if( ! get_option(STEPBYSTEP_PlUGIN_OPTION_NAME) ){
            update_option( STEPBYSTEP_PlUGIN_OPTION_NAME, StepByStepDefaultOption::getDefaultOptions() );
        }
        if( ! get_option(STEPBYSTEP_PlUGIN_OPTION_VERSION) ){
            update_option(STEPBYSTEP_PlUGIN_OPTION_VERSION, STEPBYSTEP_PlUGIN_VERSION);
        }
    }

    static public function activation()
    {
        // debug.log
        error_log('plugin '.STEPBYSTEP_PlUGIN_NAME.' activation');
        //Создание таблицы Гостевой книги
        StepByStepGuestBookSubMenuModel::createTable();


    }

    static public function deactivation()
    {
        // debug.log
        error_log('plugin '.STEPBYSTEP_PlUGIN_NAME.' deactivation');
        delete_option(STEPBYSTEP_PlUGIN_OPTION_NAME);
        delete_option(STEPBYSTEP_PlUGIN_OPTION_VERSION);
    }

}

StepByStepPlugin::getInstance();
