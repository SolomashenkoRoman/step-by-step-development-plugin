<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 21.02.17
 * Time: 4:55 PM
 */

namespace includes\widgets;


use includes\controllers\admin\menu\StepByStepICreatorInstance;

class StepByStepGuestBookDashboardWidget implements StepByStepICreatorInstance
{
    public function __construct() {
        // Регистрация виджета консоли
        add_action( 'wp_dashboard_setup', array( &$this, 'addDashboardWidgets' ) );
    }
    // Используется в хуке
    public function addDashboardWidgets(){
        wp_add_dashboard_widget(
            'step_by_step_guest_book_dashboard_widget',         // Идентификатор виджета.
            __('Guest book', STEPBYSTEP_PlUGIN_TEXTDOMAIN),           // Заголовок виджета.
            array( &$this, 'renderDashboardWidget'  ) // Функция отображения.
        );
    }
    // Выводит контент
    public function renderDashboardWidget(){
        echo 'Hello';
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}