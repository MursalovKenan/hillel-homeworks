<?php

namespace Mursalov\Logger\Classes;


class Formatter implements FormatterInterface
{
    private const LOG_DATE = '{date}';
    private const LOG_LEVEL = '{level}';
    private const LOG_MESSAGE = '{message}';
    private const LOG_CONTEXT = '{context}';
    private string $format;

    public function __construct($format = '{date} {level} {message} {context}')
    {
        $this->format = $format;
    }

    public function format($level, \Stringable|string $message, array $context = []): string
    {
        $logInfo = '';
        $formatParams = explode(' ', $this->format);
        foreach ($formatParams as $formatParam) {
            if ($formatParam == self::LOG_DATE) {
                $dateFormat = 'Y-m-d H:i:s';
                $logDate = date($dateFormat);
                $logInfo .= $logDate . ' ';
            } elseif ($formatParam == self::LOG_LEVEL) {
                $logInfo .= strtoupper($level) . ' ';
            }elseif ($formatParam == self::LOG_MESSAGE) {
                $logInfo .= $message . ' ';
            }elseif ($formatParam == self::LOG_CONTEXT) {
                foreach ($context as $key=>$value) {
                    $logInfo .= $key . ' = ' . $value . ' ';
                }
                //todo how to print array and object value.
            }
        }
        $logInfo .=PHP_EOL;
        return $logInfo;
    }
}