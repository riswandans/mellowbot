<?php
require '../app.php';

$MellowBot = new MellowBot();
$MellowBot->text('current date');
$MellowBot->response();
$MellowBot->text('tomorrow date');
$MellowBot->response();