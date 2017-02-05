<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 27.01.17
 * Time: 14:30
 */

namespace includes\controllers\admin\menu;


abstract class StepByStepBaseAdminMenuController implements StepByStepIСreatorInstance
{
    public function __construct(){
        /*
         * Регистрирует хук-событие. При регистрации указывается PHP функция,
         * которая сработает в момент события, которое вызывается с помощью do_action().
         */
        add_action('admin_menu', array( &$this, 'action'));
    }

    abstract public function action();
    abstract public function render();
}