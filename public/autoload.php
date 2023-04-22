<?php
spl_autoload_register(function ($className) {
    $prefix = 'App\\';
    $baseDirectory = __DIR__ . '/App/';

    $className = ltrim($className, '\\');
    $fileName = '';

    if (strpos($className, $prefix) === 0) {
        $fileName = str_replace('\\', '/', substr($className, strlen($prefix))) . '.php';
    }

    $file = $baseDirectory . $fileName;

    if (file_exists($file)) {
        require $file;
    }
});