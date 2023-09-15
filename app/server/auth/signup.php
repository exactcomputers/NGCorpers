<?php
require_once dirname(__DIR__) . '/index.php';

if( $_SERVER['REQUEST_METHOD'] === "POST" ){
    // 
    $fullname   = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
    $email      = isset($_POST['email']) ? trim($_POST['email']) : '';
    $gender     = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $password   = isset($_POST['password']) ? trim($_POST['password']) : '';
    try {
        if( !$fullname || !$email || !$gender || !$password ) {
            throw new Exception("Error! All fields are required", 1);
        }elseif ( !$validate->verifyEmail($email) ) {
            throw new Exception("Invalid email address", 1);
        }elseif( !$validate->checkPassword($password) ){
            throw new Exception("Invalid password combination, atleast 8 characters of alphanumeric is required", 1);
        }else{
            $postdata = array(
                "fullname" => $fullname, "email" => $email,
                "gender" => $gender, "password" => $password
            );
            $req = new HttpRequest("auth/register/", "POST", $postdata);
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