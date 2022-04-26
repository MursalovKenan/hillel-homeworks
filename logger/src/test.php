<?php

namespace Mursalov\Logger;

use Mursalov\Logger\Classes\FileWriter;
use Mursalov\Logger\Classes\Formatter;

include __DIR__ . '/../vendor/autoload.php';

$formatter = new Formatter();
$writer = new FileWriter($formatter);
$logger = new Logger($writer);
$logger->alert('Holly shit happen');