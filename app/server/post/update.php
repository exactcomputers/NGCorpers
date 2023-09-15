<?php
// 
require_once dirname(__DIR__) . '/index.php';

if ( $_SERVER['REQUEST_METHOD'] === "POST" ) :
    // $_POST = json_decode(file_get_contents('php://input'), true);
    $replies    = isset($_POST['replies']) ? trim($_POST['replies']) : '';
    $likes      = isset($_POST['likes']) ? trim($_POST['likes']) : '';
    try {
        $postdata = array(
            "replies" => $replies, "like" => $likes  
        );
        $req = new HttpRequest("posts/update", "PATCH", $postdata, HEADERS);
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