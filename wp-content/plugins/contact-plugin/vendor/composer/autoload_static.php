<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee062d2ac0e28cc5a9431db6a72056c1
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee062d2ac0e28cc5a9431db6a72056c1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee062d2ac0e28cc5a9431db6a72056c1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitee062d2ac0e28cc5a9431db6a72056c1::$classMap;

        }, null, ClassLoader::class);
    }
}
