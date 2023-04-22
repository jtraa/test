<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit887c72f1d0f8aa29d500e7ad0efdbd5d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit887c72f1d0f8aa29d500e7ad0efdbd5d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit887c72f1d0f8aa29d500e7ad0efdbd5d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit887c72f1d0f8aa29d500e7ad0efdbd5d::$classMap;

        }, null, ClassLoader::class);
    }
}
