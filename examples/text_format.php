<?php
require '../app.php';

$MellowBot = new MellowBot();
$MellowBot->text('uppercase Hello World');
$MellowBot->reply();
$MellowBot->text('lowercase Hello World');
$MellowBot->reply();