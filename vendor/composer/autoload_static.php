<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c7906e0c3d2d67d9913daa777260113
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Test\\' => 5,
        ),
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'H' => 
        array (
            'Helper\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Test\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Helper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/helpers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c7906e0c3d2d67d9913daa777260113::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c7906e0c3d2d67d9913daa777260113::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0c7906e0c3d2d67d9913daa777260113::$classMap;

        }, null, ClassLoader::class);
    }
}
