<?php
if ( !isset($site_header) )
	require_once( __DIR__ . '/app-load.php');

// checkSession();

parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $query);

$parts 	= array_slice(explode("/", $_SERVER["REQUEST_URI"]), -2);
$module = $parts[0] === "app" ? "" : $parts[0];

if ( query_uri('auth') ) {
	include path(__DIR__ . "/auth", "index");
	exit(0);
}

// request uri
$module 	= isset($query['module']) ? $query['module'] : $module;
$pagename 	= query_uri('page') !== null ? query_uri('page') : end($parts);

// page uri
$page_url 	= !empty($pagename) ? buildFile($pagename) : '';
$page_title = !empty($pagename) ? ucwords(stripDashes($pagename)) : '';

// load template
include path('layout', 'header');
if ( $module && is_dir('src/'  . $module) ) :
    include 'src/' .$module . BASE_FILE;
elseif ( $pagename && file_exists('src/' . $page_url) ) :
	include 'src/' .$page_url;	
else :
    include 'src' . BASE_FILE;
endif;
include path('layout', 'footer');
