<?php

/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 21.02.17
 * Time: 3:59 PM
 */

namespace includes\widgets;

class StepByStepGuestBookWidget extends \WP_Widget
{
    public function __construct() {

        /**
         * https://developer.wordpress.org/reference/classes/wp_widget/__construct/
         * WP_Widget::__construct(
         *      string $id_base, //Base ID для виджета, в нижнем регистре и уникальным. Если оставить пустым,
         *                          то часть имени класса виджета будет использоваться Должно быть уникальным.
         *      string $name, //Имя виджета отображается на странице конфигурации.
         *      array $widget_options = array(),
         *      array $control_options = array()
         * )
         *
         */

        parent::__construct(
            "step_by_step_guest_book",
            "Step by Stepe Guest Book Widget",
            array("description" => "Guest book")
        );
    }
}