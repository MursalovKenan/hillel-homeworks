<?php

namespace Mursalov\Logger;


use Mursalov\Logger\Classes\WriterInterface;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger
{
    private WriterInterface $writer;

    /**
     * @param WriterInterface $writer
     */
    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }


    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->writer->write($level, $message, $context);
    }
}