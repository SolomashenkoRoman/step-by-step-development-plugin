<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 16.02.17
 * Time: 15:42
 */

namespace includes\controllers\admin\menu;


use includes\models\admin\menu\StepByStepGuestBookSubMenuModel;

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
            'step_by_step_control_guest_book_menu',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        /*
        В Гостевой книги может быть несколько view (Отображение данных таблицы,
        Добавление данных в таблице, Редактирование данных в таблице,
        Удаление данных с таблицы). Что бы определить контролеру какое действие в данный
        момент обрабатывать к ссылке будет добляться $_GET['action']. Мы его можем получить
        и определить какой view подшружать странице.
        */
        $action = isset($_GET['action']) ? $_GET['action'] : null ;
        //Данные которые будут передаваться в view
        $data = array();
        $pathView = STEPBYSTEP_PlUGIN_DIR;
        switch($action) {
            // Подгружаем view для добавление данных в таблицу
            case "add_data":

                break;
            // Сохранение данных в таблицу
            case "insert_data":

                break;
            // Подгружаем view для редактирование данных в таблицу
            case "edit_data":

                break;
            // Обновление редактированых данных в таблице
            case "update_data":

                break;
            // Удаление данных
            case "delete_data":

                break;
            default:
                //Получение всех записей в таблице чтобы отобразить их view
                $data = StepByStepGuestBookSubMenuModel::getAll();
                $pathView .= "/includes/views/admin/menu/StepByStepGuestBookSubMenu.view.php";
                $this->loadView($pathView, 0, $data);
        }

    }

    /**
     * Метод перенаправления на нужную страницу
     * @param string $page
     */
    public function redirect($page = ''){
        echo '<script type="text/javascript">
                  document.location.href="'.$page.'";
           </script>';
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}