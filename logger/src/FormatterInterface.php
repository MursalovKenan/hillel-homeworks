<?php

namespace Mursalov\Logger;

interface FormatterInterface
{
    public function format($date, $level, \Stringable|string $message, array $context = []);
}