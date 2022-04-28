<?php

use Mursalov\Logger\FileWriter;
use Mursalov\Logger\Formatter;
use Mursalov\Logger\Logger;

include __DIR__ . '/../vendor/autoload.php';

$formatter = new Formatter();
$writer = new FileWriter($formatter, __DIR__ . '/logger/log.txt');
$messageFormatter = new Formatter(Formatter::LOG_MESSAGE);
$messageWriter = new FileWriter($messageFormatter, __DIR__ . '/logger/messageLog.txt');

$logger = new Logger($writer);
$logger->setWriter($messageWriter);
$context = [
    'a' => 'aa',
    'b' => 'bbb',
    'c' => [
        'a1' => 'a1',
        'a2' => 'a2',
    ],
    'd' => $logger
];
$logger->emergency('Holy shit happened', $context);