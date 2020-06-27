<?php

$a = array();
$a['filename'] = 'nopermission.php';
$a['title'] = 'Error: 403';
$a['data'] = array();

header('HTTP/1.0 403 No Permission', true, 403);

return $a;

