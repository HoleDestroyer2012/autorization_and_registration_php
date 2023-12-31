<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit669b27e55a571ada3f11a5083716a873
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit669b27e55a571ada3f11a5083716a873::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit669b27e55a571ada3f11a5083716a873::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit669b27e55a571ada3f11a5083716a873::$classMap;

        }, null, ClassLoader::class);
    }
}
