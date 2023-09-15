<?php
require_once dirname(__DIR__) . '/index.php';

if ( $_SERVER['REQUEST_METHOD'] === "GET" ) :
    $page = isset($_GET['pg']) ? $_GET['pg'] : 1;
    $res = httpRequest("posts", ["page" => $page, "limit" => 10]);
    echo json_encode($res);
endif;
