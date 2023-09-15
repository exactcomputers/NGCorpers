<?php
require_once dirname(__DIR__) . '/index.php';

if ( $_SERVER['REQUEST_METHOD'] === "GET" ) :
    $searchQ = isset($_GET['searchQ']) ? trim($_GET['searchQ']) : "";
    $res = httpRequest("posts/search/$searchQ", []);
    echo json_encode($res);
endif;
