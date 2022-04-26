<?php

namespace Mursalov\Logger\Classes;


class Formatter implements FormatterInterface
{
    private string $format;

    public function __construct($format = '{level} {data} {message} {context}')
    {
        $this->format = $format;
    }

    public function format($level, \Stringable|string $message, array $context = []): string
    {
        $dateFormat = 'Y-m-d H:i:s';
        $logDate = date($dateFormat);
        return $logDate . '|' . strtoupper($level) . '|' . $message . PHP_EOL;
    }
}