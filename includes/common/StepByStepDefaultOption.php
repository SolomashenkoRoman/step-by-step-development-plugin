<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 12.02.17
 * Time: 23:53
 */

namespace includes\common;


class StepByStepDefaultOption
{
    /**
     * Возвращает массив дефолтных настроек
     * @return array
     */
    public static function getDefaultOptions()
    {
        $defaults = array(
            'account' => array(
                'marker' => '',
                'token' => ''
            )
        );
        // Фильтр которому можно подключиться и изменить массив дефолтных настроек
        $defaults = apply_filters('step_by_step_default_option', $defaults );
        return $defaults;
    }
}