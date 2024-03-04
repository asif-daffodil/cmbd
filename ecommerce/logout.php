<?php
require_once './classes/sessionClass.php';

use classes\session\sessionClass as session;

$session = new session();
$session->unsetSession('user');
header('Location: index.php');
