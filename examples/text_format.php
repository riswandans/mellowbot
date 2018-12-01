<?php
require '../app.php';

$MellowBot = new MellowBot();
$MellowBot->text('uppercase Hello World');
$MellowBot->response();
$MellowBot->text('lowercase Hello World');
$MellowBot->response();