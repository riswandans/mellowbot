<?php
require '../app.php';

$MellowBot = new MellowBot();
$MellowBot->text('translate english to french Hello World');
$MellowBot->response();