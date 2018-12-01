<?php
require '../app.php';

$MellowBot = new MellowBot();
$MellowBot->text('current date');
$MellowBot->reply();
$MellowBot->text('tomorrow date');
$MellowBot->reply();