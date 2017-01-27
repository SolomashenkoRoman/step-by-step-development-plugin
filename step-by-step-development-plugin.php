<?php

/*
Plugin Name: Step By Step Development Plugin
Plugin URI: https://github.com/SolomashenkoRoman/step-by-step-development-plugin
Description: Step by step development of the plugin.
Version: 1.0
Author: romansolomashenko
Author URI: https://www.linkedin.com/in/solomashenkoroman/
Text Domain: step-by-step-development-plugin
Domain Path: /languages/
License: A "Slug" license name e.g. GPL2
    Copyright 2017  Solomashenko Roman  (email: solomashenko.roman.1991@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
require_once plugin_dir_path(__FILE__) . '/config-path.php';
require_once STEPBYSTEP_PlUGIN_DIR.'/includes/common/StepByStepAutoload.php';
require_once STEPBYSTEP_PlUGIN_DIR.'/includes/StepByStepPlugin.php';


register_activation_hook( __FILE__, array('includes\StepByStepPlugin' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('includes\StepByStepPlugin' ,  'deactivation' ) );

