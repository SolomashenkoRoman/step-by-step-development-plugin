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
    public static function getDefaultOptions()
    {
        $defaults = array(
            'account' => array(
                'marker' => '',
                'token' => ''
            )
        );
        $defaults = apply_filters('step_by_step_default_option', $defaults );
        return $defaults;
    }
}