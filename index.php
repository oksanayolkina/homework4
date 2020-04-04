<?php

require_once "session.php";
require_once "func.php";

$action = $_GET['action'] ?? 'index';

echo $action;