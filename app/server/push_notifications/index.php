<?php
require_once dirname(__DIR__) . '/index.php';

if ( $_SERVER['REQUEST_METHOD'] === "GET" ) :
    $res = httpRequest("notifications", []);
    echo json_encode($res);
endif;
