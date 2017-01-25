<?php

/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 16.01.17
 * Time: 6:53 PM
 */
namespace includes;

use includes\common\StepByStepLoader;
//use includes\example\StepByStepExampleAction;
//use includes\example\StepByStepExampleFilter;

class StepByStepPlugin
{
    private static $instance = null;
    private function __construct() {
        /*$stepByStepExampleFilter = StepByStepExampleFilter::newInstance();
        $stepByStepExampleFilter->callMyFilter("Roman");
        $stepByStepExampleFilter->callMyFilterAdditionalParameter("Roman", "Softgroup", "Poltava");
        $stepByStepExampleAction = StepByStepExampleAction::newInstance();
        $stepByStepExampleAction->callMyAction();
        $stepByStepExampleAction->callMyActionAdditionalParameter( 'test1', 'test2', 'test3' );*/
        StepByStepLoader::getInstance();
    }
    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

    static public function activation()
    {
        // debug.log
        error_log('plugin '.STEPBYSTEP_PlUGIN_NAME.' activation');
    }

    static public function deactivation()
    {
        // debug.log
        error_log('plugin '.STEPBYSTEP_PlUGIN_NAME.' deactivation');
    }

}

StepByStepPlugin::getInstance();
