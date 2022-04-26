<?php

namespace Mursalov\Logger;


class formatter implements FormatterInterface
{
    private string $format;

    public function __construct($format = '{level} {data} {message} {context}')
    {
        $this->format = $format;
    }

    public function format($date, $level, \Stringable|string $message, array $context = [])
    {
        $info = $date . '|' . strtoupper($level) . '|' . $message;
        return $info;
    }
}