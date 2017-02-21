<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 25.01.17
 * Time: 8:39 PM
 */

namespace includes\common;

use includes\ajax\StepByStepGuestBookAjaxHandler;
use includes\controllers\admin\menu\StepByStepGuestBookSubMenuController;
use includes\controllers\admin\menu\StepByStepMainAdminMenuController;
use includes\controllers\admin\menu\StepByStepMainAdminSubMenuController;
use includes\controllers\admin\menu\StepByStepMyCommentsMenuController;
use includes\controllers\admin\menu\StepByStepMyDashboardMenuController;
use includes\controllers\admin\menu\StepByStepMyMediaMenuController;
use includes\controllers\admin\menu\StepByStepMyOptionsMenuController;
use includes\controllers\admin\menu\StepByStepMyPagesMenuController;
use includes\controllers\admin\menu\StepByStepMyPluginsMenuController;
use includes\controllers\admin\menu\StepByStepMyPostsMenuController;
use includes\controllers\admin\menu\StepByStepMyThemeMenuController;
use includes\controllers\admin\menu\StepByStepMyToolsMenuController;
use includes\controllers\admin\menu\StepByStepMyUsersMenuController;
use includes\controllers\site\shortcodes\StepByStepCalendarPricesMonthShortcodeController;
use includes\controllers\site\shortcodes\StepByStepGuestBookShortcodesController;
use includes\example\StepByStepExampleAction;
use includes\example\StepByStepExampleFilter;
use includes\widgets\StepByStepGuestBookDashboardWidget;

class StepByStepLoader
{
    private static $instance = null;

    private function __construct(){
        // is_admin() Условный тег. Срабатывает когда показывается админ панель сайта (консоль или любая
        // другая страница админки).
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            // Когда в админке вызываем метод admin()
            $this->admin();
        } else {
            // Когда на сайте вызываем метод site()
            $this->site();
        }
        $this->all();


    }

    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Метод будет срабатывать когда вы находитесь в Админ панеле. Загрузка классов для Админ панели
     */
    public function admin(){
        StepByStepMainAdminMenuController::newInstance();
        StepByStepMainAdminSubMenuController::newInstance();
        StepByStepMyDashboardMenuController::newInstance();
        StepByStepMyPostsMenuController::newInstance();
        StepByStepMyMediaMenuController::newInstance();
        StepByStepMyPagesMenuController::newInstance();
        StepByStepMyCommentsMenuController::newInstance();
        StepByStepMyThemeMenuController::newInstance();
        StepByStepMyPluginsMenuController::newInstance();
        StepByStepMyUsersMenuController::newInstance();
        StepByStepMyToolsMenuController::newInstance();
        StepByStepMyOptionsMenuController::newInstance();
        StepByStepGuestBookSubMenuController::newInstance();
        // Подключаем виджет гостевой книги
        StepByStepGuestBookDashboardWidget::newInstance();


    }

    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
        StepByStepCalendarPricesMonthShortcodeController::newInstance();
        // Шорткод для формы гостевой книги
        StepByStepGuestBookShortcodesController::newInstance();
    }


    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){
        StepByStepLocalization::getInstance();
        StepByStepLoaderScript::getInstance();
        // подключаем ajax обработчик
        StepByStepGuestBookAjaxHandler::newInstance();
        //$stepByStepExampleAction = StepByStepExampleAction::newInstance();
        /*$stepByStepExampleFilter = StepByStepExampleFilter::newInstance();
       $stepByStepExampleFilter->callMyFilter("Roman");
       $stepByStepExampleFilter->callMyFilterAdditionalParameter("Roman", "Softgroup", "Poltava");
       $stepByStepExampleAction = StepByStepExampleAction::newInstance();
       $stepByStepExampleAction->callMyAction();
       $stepByStepExampleAction->callMyActionAdditionalParameter( 'test1', 'test2', 'test3' );*/
    }
}