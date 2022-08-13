<?php
/**
 * Template Name: Class - Login Form
 */
if (!defined('WPINC')) {
	die;
}

class SbLoginForm {

    protected $sbApiKey;

    public function __construct()
    {
        $this->sbApiKey = get_option('sb_api_key');
    }

    public function studentLoginForm() {
        include_once "includes/student-login-form.php";
        return;
    }
}