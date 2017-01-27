<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 27.01.17
 * Time: 16:25
 */

namespace includes\controllers\admin\menu;


class StepByStepMainAdminSubMenuController extends StepByStepBaseAdminMenuController
{

    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page(
            STEPBYSTEP_PlUGIN_TEXTDOMAIN,
            _x(
                'Sub Step By Step',
                'admin menu page' ,
                STEPBYSTEP_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Sub Step By Step',
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
        _e("Hello world sub menu", STEPBYSTEP_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}