<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 16.02.17
 * Time: 15:42
 */

namespace includes\controllers\admin\menu;


class StepByStepGuestBookSubMenuController extends StepByStepBaseAdminMenuController
{

    public function action()
    {
        // TODO: Implement action() method.
        //Добавление пункта меню
        $pluginPage = add_submenu_page(
            STEPBYSTEP_PlUGIN_TEXTDOMAIN,
            _x(
                'Guest book',
                'admin menu page' ,
                STEPBYSTEP_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Guest book',
                'admin menu page' ,
                STEPBYSTEP_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'step_by_step_control_sub_menu',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}