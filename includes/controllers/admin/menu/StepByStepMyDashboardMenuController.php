<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.01.17
 * Time: 18:34
 */

namespace includes\controllers\admin\menu;


class StepByStepMyDashboardMenuController extends StepByStepBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_dashboard_page(
            __('Sub dashboard Step By Step', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            __('Sub dashboard Step By Step', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_dashboard_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page dashboards", STEPBYSTEP_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}