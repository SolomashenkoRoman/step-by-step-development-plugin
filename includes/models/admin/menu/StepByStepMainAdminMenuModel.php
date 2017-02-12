<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 13.02.17
 * Time: 0:47
 */

namespace includes\models\admin\menu;


class StepByStepMainAdminMenuModel
{

    public function __construct(){
        add_action( 'admin_init', array( &$this, 'createOption' ) );

    }

    /**
     * Регистрировать опции
     * Добавлять поля опции
     * Добавлять секции опции

     */
    public function createOption()
    {


    }

    /**
     * Сохранение опции
     * @param $input
     */
    public function saveOption($input)
    {


    }

}