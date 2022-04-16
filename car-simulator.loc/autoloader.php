<?php

class ClassLoader
{
    public static function autoload($className)
    {
        $filename = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
        if (file_exists($filename)) {
            require $filename;
        }
    }
}

spl_autoload_register([ClassLoader::class, 'autoload']);