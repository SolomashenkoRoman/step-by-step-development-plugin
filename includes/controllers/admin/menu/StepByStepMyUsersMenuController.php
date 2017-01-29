<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.01.17
 * Time: 19:35
 */

namespace includes\controllers\admin\menu;


class StepByStepMyUsersMenuController extends StepByStepBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_users_page(
            __('Sub users Step By Step', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            __('Sub users Step By Step', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_users_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Users", STEPBYSTEP_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}