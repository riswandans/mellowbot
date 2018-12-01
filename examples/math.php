<?php
require '../app.php';

$MellowBot = new MellowBot();
$MellowBot->text('math 1+1'); // Alternative is 'result'
$MellowBot->reply();