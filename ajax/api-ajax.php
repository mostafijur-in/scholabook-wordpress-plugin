<?php
/**
 * Template Name: Ajax requests to scholabook api service
 */

require_once SB_PATH ."api/SbApi.php";

/**
 * Student Login Ajax
 */
add_action('wp_ajax_getStudentLoginAjax', 'getStudentLogin');
add_action('wp_ajax_nopriv_getStudentLoginAjax', 'getStudentLogin');

function getStudentLogin() {
    $errors = [];
    $postData   = [];

    $postData["student_id"] = isset($_POST["student_id"]) ? $_POST["student_id"] : null;
    $postData["mobile"]     = isset($_POST["mobile"]) ? $_POST["mobile"] : null;
    $postData["password"]   = isset($_POST["password"]) ? $_POST["password"] : null;
    $postData["remember"]   = isset($_POST["remember"]) ? $_POST["remember"] : "";
    $postData["user_type"]  = "studentuser";

    if(empty($postData["student_id"])) {
        $errors["student_id"]   = "Reg. No. / Student ID is empty.";
    }
    if(empty($postData["mobile"]) || (strlen($postData["mobile"]) !== 10) ) {
        $errors["mobile"]   = "Invalid Mobile Number.";
    }
    if(empty($postData["password"])) {
        $errors["password"]   = "Password is empty.";
    }


    if(!empty($errors)) {
        echo json_encode([
            'status'    => 'error',
            'message'   => 'ERROR: Required parameters are missing or invalid.',
            'errors'    => $errors
        ]);
        wp_die();
    }


    try {
        $sbapi  = new SbApi;
        $getLogin   = $sbapi->postData("remote-auth/get-login", $postData);
        echo json_encode($getLogin);
    } catch (Exception $e) {
        echo json_encode([
            'status'    => 'error',
            'message'   => $e->getMessage(),
        ]);
    }

	wp_die();
}