<?php

namespace Mursalov\Logger;

use Mursalov\Logger\Classes\FileWriter;
use Mursalov\Logger\Classes\Formatter;

include __DIR__ . '/../vendor/autoload.php';

$formatter = new Formatter();
$writer = new FileWriter($formatter);
$logger = new Logger($writer);
$context = [
    'a' => 'aa',
    'b' => 'aa',
    'c' => [
        'a1' => 'a1a',
        'b1' => 'a1a'
    ]
];
$logger->emergency('Holy shit happened', $context);