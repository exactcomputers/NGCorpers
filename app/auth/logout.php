<?php
if (session_status() === PHP_SESSION_NONE ) session_start();

unset($_SESSION['currentUser']);
unset($_SESSION['accessToken']);

$_SESSION = array();

session_destroy();

$args = http_build_query([
    'action' => 'logout', 
    'loggedout' => true
]);

echo "<script>
    localStorage.removeItem('currentUser')
    localStorage.removeItem('accessToken')
    localStorage.clear();
    window.location.replace('login?$args')
</script>";