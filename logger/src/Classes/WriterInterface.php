<?php

namespace Mursalov\Logger\Classes;

interface WriterInterface
{
    public function write($level, \Stringable|string $message, array $context = []);
}