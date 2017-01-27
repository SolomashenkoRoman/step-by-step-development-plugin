<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 27.01.17
 * Time: 15:26
 */

namespace includes\controllers\admin\menu;


class StepByStepMainAdminMenuController extends StepByStepBaseAdminMenuController
{

    public function action()
    {
        // TODO: Implement action() method.
        /**
         * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
         *
         */
        $pluginPage = add_menu_page(
            _x(
                'Step By Step',
                'admin menu page' ,
                STEPBYSTEP_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Step By Step',
                'admin menu page' ,
                STEPBYSTEP_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            STEPBYSTEP_PlUGIN_TEXTDOMAIN,
            array(&$this,'render'),
            STEPBYSTEP_PlUGIN_URL .'assets/images/main-menu.png'
        );
    }

    /**
     * Метод отвечающий за контент страницы
     */
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello world", STEPBYSTEP_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}