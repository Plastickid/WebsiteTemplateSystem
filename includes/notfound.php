<?php

$a = array();
$a['filename'] = 'notfound.php';
$a['title'] = 'Error: 404';
$a['data'] = array();

header('HTTP/1.0 404 Not Found', true, 404);

return $a;
