<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.01.17
 * Time: 19:19
 */

namespace includes\controllers\admin\menu;


class StepByStepMyCommentsMenuController extends StepByStepBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_comments_page(
            __('Sub comments Step By Step', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            __('Sub comments Step By Step', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_comments_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Comments", STEPBYSTEP_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}