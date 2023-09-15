<?php
// 
require_once dirname(__DIR__) . '/index.php';

if ( $_SERVER['REQUEST_METHOD'] === "POST" ) :
    // $_POST = json_decode(file_get_contents('php://input'), true);
    $title      = isset($_POST['title']) ? trim($_POST['title']) : '';
    $content    = isset($_POST['content']) ? trim($_POST['content']) : '';
    $category   = isset($_POST['category']) ? trim($_POST['category']) : '';
    $tag        = isset($_POST['tags']) ? trim($_POST['tags']) : '';
    try {
        if ( !$title || !$content || !$category || !$tag ) {
            throw new Exception("Required fields missing! Fill all required fields", 1);
        }
        $image = $imageUrl = "";
        if ( !empty($_FILES['image']['name']) ) {
            $tmp = $_FILES['image']['tmp_name'];
            // $curlFile = PHP_VERSION >= 5.5 ? '@'.$tmp :  new CURLFILE($tmp);
            // $tmp: '/path/to/file'
            $image = uploadImage("image", "post", "../../dist/images/");
            $imageUrl = APP_URL . "dist/images/posts/$image";
        }
        $tags = explode(",", $tag);
        $postdata = array(
            "title" =>  $title, "content" => $content, "category" => $category, 
            "tags" => $tags, "pictureUrl" => $imageUrl
        );
        $req = new HttpRequest("posts", "POST", $postdata, HEADERS);
        $res = $req->post();
        if( $req->errors ) throw new Exception($req->errors, 1);
        $result = json_decode($res, true);
        if( $req->info !== 201 ) throw new Exception($result['message'], 1);
        if( isset($result['status']) && $result['status'] === "success" ) {
            $response = ["status" => true, "success" => $result['message']];
        } else {
            throw new Exception($result['message'], 1);
        }
        $req->close();
    } catch ( Exception $e ) {
        if ( !empty($image) ) @unlink("../../dist/images/posts/".$image);
        $response = ["status" => false, "error" => $e->getMessage()];
    }
    echo json_encode($response);
endif;