<?php
require_once dirname(__DIR__) . '/index.php';

if ( $_SERVER['REQUEST_METHOD'] === "POST" ) :
    $res = httpRequest("comments/", []);
    echo json_encode($res);
endif;
