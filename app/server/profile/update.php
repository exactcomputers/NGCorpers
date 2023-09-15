<?php

require_once dirname(__DIR__) . '/index.php';

if ( $_SERVER['REQUEST_METHOD'] === "POST" ) :
    // $_POST = json_decode(file_get_contents('php://input'), true);
    $usrname    = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email      = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phoneno    = isset($_POST['mobileno']) ? trim($_POST['mobileno']) : '';
    $replies    = isset($_POST['replies']) ? trim($_POST['replies']) : '';
    $likes      = isset($_POST['likes']) ? trim($_POST['likes']) : '';
    // $bio        = isset($_POST['bio']) ? trim($_POST['bio']) : '';
    try {
        if ( !$validate->verifyPhoneNumber($phoneno) ) {
            throw new Exception("Mobile number is invalid", 1);
        }
        $threadLikes    = $likes == "on" ? true : false;
        $threadComment  = $replies == "on" ? true : false; 
        $postdata = array(
            "username" => $usrname, "email" => $email, "mobileno" => $phoneno,
            "threadLike" => $threadLikes, "threadComment" => $threadComment  
        );
        $req = new HttpRequest("users/profile/update", "PATCH", $postdata, HEADERS);
        $res = $req->patch();
        if( $req->errors ) throw new Exception($req->errors, 1);
        $result = json_decode($res, true);
        if( $req->info !== 200 ) throw new Exception($result['message'], 1);
        if( isset($result['status']) && $result['status'] === "success" ) {
            $response = ["status" => true, "success" => $result['message']];
        } else {
            throw new Exception($result['message'], 1);
        }
        $req->close();
    } catch ( Exception $e ) {
        $response = ["status" => false, "error" => $e->getMessage()];
    }
    echo json_encode($response);
endif;