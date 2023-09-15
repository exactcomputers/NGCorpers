<?php
require_once dirname(__DIR__) . '/index.php';

if( $_SERVER['REQUEST_METHOD'] === "POST" ) {
    // 
    $email   = isset($_POST['email']) ? trim($_POST['email']) : '';
    $rstoken = isset($_POST['rstkn']) ? trim($_POST['rstkn']) : '';
    $passwd  = isset($_POST['password']) ? trim($_POST['password']) : '';
    $cpasswd = isset($_POST['cpassword']) ? trim($_POST['cpassword']) : '';
    try {
        if( !$email || !$rstoken || !$cpasswd || !$passwd ) {
            throw new Exception("Invalid Request! Some fields could not be found.", 1);
        } elseif ( $cpasswd !== $passwd ) {
            throw new Exception("Matching Error! Please, confirm your entered password", 1);
        }else{
            $postdata = array(
                "email" => $email, "password" => $passwd, "rstoken" => $rstoken
            );
            $req = new HttpRequest("auth/reset-password/", "PATCH", $postdata);
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