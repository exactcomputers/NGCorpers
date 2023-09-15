<?php
require_once dirname(__DIR__) . '/index.php';

if( $_SERVER['REQUEST_METHOD'] === "POST" ) {
    $user_ip = $_SERVER['REMOTE_ADDR'];
    // 
    $email    = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    try{
      // check for empty fields
      if ( !$email || !$password ) throw new Exception("All fields are required", 1);
      $postdata = array(
        "email" => $email, "password" => $password, "user_ip" => $user_ip
      );
      $req = new HttpRequest("auth/login", "POST", $postdata);
      $response = $req->post();
      // check for http error
      if( $req->errno ) throw new Exception("Error! ".$req->errors, 1);
      // decode to php array
      $result = json_decode($response, true);
      if( $req->info !== 200 ) throw new Exception($result['message'], 1);
      // check status for success
      if( !isset($result['status']) || $result['status'] !== 'ok' ) throw new Exception($result['message'], 1);
      /* set current user session */
      $_SESSION['loggedin'] = true;
      $_SESSION['accessToken'] = $result['token'];
      $_SESSION['currentUser'] = $result['user'];
      // 
      echo json_encode([
        "status" => true, "success" => "./", 
        "token" => $result['token'], "user" => $result['user']
      ]);
      $req->close();
    } catch( Exception $e ){
      echo json_encode(["status" => false, "error" => $e->getMessage()]);
    }
}