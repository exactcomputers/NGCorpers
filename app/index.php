<?php
ob_start();
/**
 * Tells server to load the site environment and output it.
 *
 * @var bool
 */
define('APP_USE_THEMES', true);

# loads the environment
require __DIR__ . '/app-header.php';
