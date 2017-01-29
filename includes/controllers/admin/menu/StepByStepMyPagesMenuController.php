<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.01.17
 * Time: 19:15
 */

namespace includes\controllers\admin\menu;


class StepByStepMyPagesMenuController extends StepByStepBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_pages_page(
            __('Sub pages Step By Step', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            __('Sub pages Step By Step', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_pages_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Pages", STEPBYSTEP_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}