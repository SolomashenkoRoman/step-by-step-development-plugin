<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 21.02.17
 * Time: 4:55 PM
 */

namespace includes\widgets;


use includes\controllers\admin\menu\StepByStepICreatorInstance;
use includes\models\admin\menu\StepByStepGuestBookSubMenuModel;

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
        // Запрашиваем данные из таблицы
        $data = StepByStepGuestBookSubMenuModel::getAll();
        // Вывод данных
        ?>
        <table  border="1">
            <thead>
            <tr>
                <td>
                    <?php _e('Name', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
                </td>
                <td>
                    <?php _e('Messsage', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
                </td>
                <td>
                    <?php _e('Date', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
                </td>

            </tr>
            </thead>
            <tbody>
            <?php if(count($data) > 0 && $data !== false){  ?>
                <?php foreach($data as $value): ?>
                    <tr class="row table_box">

                        <td>
                            <?php echo $value['user_name']; ?>
                        </td>
                        <td>
                            <?php echo $value['message']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y H:i', $value['date_add']); ?>
                        </td>



                    </tr>
                <?php endforeach ?>
            <?php }else{ ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}