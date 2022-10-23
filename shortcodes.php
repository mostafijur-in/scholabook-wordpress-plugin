<?php

/**
 * Template Name: Shortcodes
 */
if (!defined('WPINC')) {
	die;
}

function studentLoginForm()
{
    $sbLoginForm    = new SbLoginForm;

	ob_start();
	$sbLoginForm->studentLoginForm();
    
	$output = ob_get_clean();
	return $output;
}
add_shortcode('student-login-form', 'studentLoginForm');