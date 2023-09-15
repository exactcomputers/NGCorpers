<?php
require_once dirname(__DIR__) . '/index.php';

if( $_SERVER['REQUEST_METHOD'] === "POST" ){
    // 
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    try {
        if ( !$validate->verifyEmail($email) ) {
            throw new Exception("Invalid email address", 1);
        }else{
            $postdata = array("email" => $email);
            $req = new HttpRequest("auth/forgot-password/", "POST", $postdata);
            $response = $req->post();
            $res = json_decode($response, 1);
            if( isset($res['status']) && $res['status'] === "success" ){
                $results = array("status" => true, "success" => $res['message']); 
            }else{
                throw new Exception($res['message'], 1);
            }
        }    
    } catch ( Exception $e ) {
        $results = array("status" => false, "error" => $e->getMessage());
    }
    echo json_encode($results);
}