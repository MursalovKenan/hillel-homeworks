<?php

namespace Mursalov\Logger;

use Psr\Log\AbstractLogger;

class Loger extends AbstractLogger
{
    private Formatter $formatter;

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->formatter = new Formatter();
        $dateFormat = 'Y-m-d H:i:s';
        $logDate = date($dateFormat);
        $logInfo = $this->formatter->format($logDate, $level, $message, $context);
        echo $logInfo;
    }
}