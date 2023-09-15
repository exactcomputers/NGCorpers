<?php
// 
require_once dirname(__DIR__) . '/index.php';

if ( isset($_GET['tabname']) ) {
    $data = array("tabname" => $_GET['tabname']);
    $res = httpRequest("activities/", $data);
    echo json_encode($res);
}