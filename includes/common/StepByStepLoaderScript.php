<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 05.02.17
 * Time: 5:02 PM
 */

namespace includes\common;


class StepByStepLoaderScript
{
    private static $instance = null;

    private function __construct(){
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin' ) );
            add_action('admin_head', array(&$this, 'loadHeadScriptAdmin'));
        } else {
            add_action( 'wp_enqueue_scripts', array(&$this, 'loadScriptSite' ) );
            add_action('wp_head', array(&$this, 'loadHeadScriptSite'));
            add_action( 'wp_footer', array(&$this, 'loadFooterScriptSite'));
        }

    }

    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function loadScriptAdmin($hook){
        /**
         * wp_register_script( $handle, $src, $deps, $ver, $in_footer );
         * Регистрирует файл скрипта, чтобы в дальнейшем подключать его используя функцию wp_enqueue_script()
         * $handle - Название скрипта. Должно быть уникальным, так как оно будет использоваться для вызова
         *          в дальнейшем в функции wp_enqueue_script().
         * $src - URL, путь до скрипта
         * $deps(массив) -  Массив названий всех зарегистрированных скриптов, от которых зависит этот.
         *                  Указанные тут скрипты будут загружены перед текущем. Укажите false,
         *                  если нет зависимых скриптов.
         * $ver(строка) -   Версия скрипта, которая будет добавлена в конец пути к файлу в виде аргумента (?ver=1.1).
         *                  Если версии нет укажите false, тогда WordPress добавит в конец текущую версию WP. Если
         *                  указать null, никакая версия не будет добавлена.Этот параметр нужен, чтобы корректная
         *                  версия скрипта была загружена пользователями, в обход кэша.
         * $in_footer(логический) - Где выводить скрипт: в head или footer. Обычно скрипты располагаются в head части.
         *                          Если этот параметр будет равен true скрипт будет добавлен в конец body тега, для
         *                          этого тема должна содержать функцию wp_footer() перед закрывающим тегом </body>.
         */

        wp_register_script(
            STEPBYSTEP_PlUGIN_SLUG.'-AdminMain', //$handle
            STEPBYSTEP_PlUGIN_URL.'assets/admin/js/StepByStepAdminMain.js', //$src
            array(
                'jquery'
            ), //$deps
            STEPBYSTEP_PlUGIN_VERSION, //$ver
            true //$$in_footer
        );
        /**
         * Добавляет скрипт, только если он еще не был добавлен и другие скрипты от которых он зависит зарегистрированы.
         * Зависимые скрипты добавляются автоматически.
         */
        wp_enqueue_script(STEPBYSTEP_PlUGIN_SLUG.'-AdminMain');



        /**
         * wp_register_style( $handle, $src, $deps, $ver, $media );
         * Регистрирует CSS файл в WordPress. После регистрации файл можно добавить в html документ с помощью
         * функции wp_enqueue_style().
         *
         */

        wp_register_style(
            STEPBYSTEP_PlUGIN_SLUG.'-AdminMain', //$handle
            STEPBYSTEP_PlUGIN_URL.'assets/admin/css/StepByStepAdminMain.css', // $src
            array(), //$deps,
            STEPBYSTEP_PlUGIN_VERSION // $ver
        );
        /**
         * Правильно добавляет файл CSS стилей. Регистрирует файл стилей, если он еще не был зарегистрирован.
         */
        wp_enqueue_style(STEPBYSTEP_PlUGIN_SLUG.'-AdminMain');

    }
    public function loadHeadScriptAdmin(){}
    public function loadScriptSite($hook){}
    public function loadHeadScriptSite(){}
    public function loadFooterScriptSite(){}
}