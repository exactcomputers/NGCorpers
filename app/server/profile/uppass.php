<?php

require_once dirname(__DIR__) . '/index.php';

if ( $_SERVER['REQUEST_METHOD'] === "POST" ) :
    // $_POST = json_decode(file_get_contents('php://input'), true);
    $opassword   = isset($_POST['old-password']) ? trim($_POST['old-password']) : '';
    $npassword   = isset($_POST['new-password']) ? trim($_POST['new-password']) : '';
    $cpassword  = isset($_POST['confirm-password']) ? trim($_POST['confirm-password']) : '';
    // 
    $postdata = array(
        "opassword" => $opassword, "npassword" =>  $npassword, "cpassword" => $cpassword
    );
    $req = new HttpRequest("users/profile/update-password", "PATCH", $postdata, HEADERS);
    $res = $req->patch();
    try {
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