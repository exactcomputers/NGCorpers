<?php

require_once dirname(__DIR__) . '/index.php';

// download image to temp file for upload
// $tmp = tempnam(sys_get_temp_dir(), 'php');
// file_put_contents($tmp, file_get_contents('http://cdn.soccerwiki.org/images/player/2386.jpg'));

if ( $_SERVER['REQUEST_METHOD'] === "POST" ) :
    try {
        $tmp = $_FILES['picture']['tmp_name'];
        $curlFile = PHP_VERSION >= 5.5 ? '@'.$tmp :  new CURLFILE($tmp);
        // $tmp: '/path/to/file'
        $picture = uploadImage("picture", "avatar", "../../dist/images/");
        $pictureUrl = APP_URL . "dist/images/users/$picture";
        $postdata = array("pictureTmp" => $curlFile, "profilePicUrl" => $pictureUrl);
        $req = new HttpRequest("users/profile/update-pics", "PATCH", $postdata, HEADERS);
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
        @unlink("../../dist/images/users/".$picture);
        $response = ["status" => false, "error" => $e->getMessage()];
    }
    echo json_encode($response);
endif;