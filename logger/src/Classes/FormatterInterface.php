<?php

namespace Mursalov\Logger\Classes;

interface FormatterInterface
{
    public function format($level, \Stringable|string $message, array $context = []);
}