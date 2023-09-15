<?php
require_once dirname(__DIR__) . '/index.php';

$term_id = isset($_GET['term_id']) ? $_GET['term_id'] : "";
$data = ["term_id" => $term_id];
$res = httpRequest("posts", $data);
return json_encode($res);