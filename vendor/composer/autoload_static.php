<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit802228fd51c41425558284e60035aa17
{
    public static $files = array (
        'ac59f93b3e4c82dead9232c8737e6130' => __DIR__ . '/../..' . '/src/App/Config/Routes.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Framework\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Framework',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit802228fd51c41425558284e60035aa17::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit802228fd51c41425558284e60035aa17::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit802228fd51c41425558284e60035aa17::$classMap;

        }, null, ClassLoader::class);
    }
}
