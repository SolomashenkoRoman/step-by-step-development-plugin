<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 13.02.17
 * Time: 0:47
 */

namespace includes\models\admin\menu;


use includes\controllers\admin\menu\StepByStepICreatorInstance;

class StepByStepMainAdminMenuModel implements StepByStepICreatorInstance
{

    public function __construct(){
        add_action( 'admin_init', array( &$this, 'createOption' ) );
        //error_log(1);
    }

    /**
     * Регистрировать опции
     * Добавлять поля опции
     * Добавлять секции опции

     */
    public function createOption()
    {
        //error_log(2);
        // register_setting( $option_group, $option_name, $sanitize_callback );
        // Регистрирует новую опцию
        register_setting('StepByStepMainSettings', STEPBYSTEP_PlUGIN_OPTION_NAME, array(&$this, 'saveOption'));
        // add_settings_section( $id, $title, $callback, $page );
        // Добавление секции опций
        add_settings_section( 'step_by_step_account_section_id', __('Account', STEPBYSTEP_PlUGIN_TEXTDOMAIN), '', 'step-by-step-development-plugin' );
        // add_settings_field( $id, $title, $callback, $page, $section, $args );
        // Добавление полей опций
        add_settings_field(
            'step_by_step_token_field_id',
            __('Token', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            array(&$this, 'tokenField'),
            'step-by-step-development-plugin',
            'step_by_step_account_section_id'
        );
        add_settings_field(
            'step_by_step_marker_field_id',
            __('Marker', STEPBYSTEP_PlUGIN_TEXTDOMAIN),
            array(&$this, 'markerField'),
            'step-by-step-development-plugin',
            'step_by_step_account_section_id'
        );

    }

    public function tokenField(){
        $option = get_option(STEPBYSTEP_PlUGIN_OPTION_NAME);
        ?>
            <input type="text"
                   name="<?php echo STEPBYSTEP_PlUGIN_OPTION_NAME; ?>[account][token]"
                   value="<?php echo esc_attr( $option['account']['token'] ) ?>" />
        <?php
    }
    public function markerField(){
        $option = get_option(STEPBYSTEP_PlUGIN_OPTION_NAME);
        //var_dump($option);
        ?>
        <input type="text"
               name="<?php echo STEPBYSTEP_PlUGIN_OPTION_NAME; ?>[account][marker]"
               value="<?php echo esc_attr( $option['account']['marker'] ) ?>" />
        <?php
    }
    /**
     * Сохранение опции
     * @param $input
     */
    public function saveOption($input)
    {
        error_log(3);
        error_log(print_r($input, true));
        return $input;
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}