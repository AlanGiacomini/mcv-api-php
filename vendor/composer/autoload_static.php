<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e79256e2147e1c34b4b1fe4a405f556
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WilliamCosta\\DotEnv\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WilliamCosta\\DotEnv\\' => 
        array (
            0 => __DIR__ . '/..' . '/william-costa/dot-env/src',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e79256e2147e1c34b4b1fe4a405f556::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e79256e2147e1c34b4b1fe4a405f556::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7e79256e2147e1c34b4b1fe4a405f556::$classMap;

        }, null, ClassLoader::class);
    }
}
