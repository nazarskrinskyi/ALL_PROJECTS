<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a527b6bbe5a5412db87118a1b7c073e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'O' => 
        array (
            'OOP\\SESSION_COOKIE\\' => 19,
            'OOP\\POLIMORFIZM\\' => 16,
            'OOP\\INTERFACE\\' => 14,
            'OOP\\HTML_TAGS\\' => 14,
            'OOP\\ABSTRACT\\' => 13,
        ),
        'M' => 
        array (
            'METHOD_SERVER\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'OOP\\SESSION_COOKIE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../OOP/SESSION_COOKIE',
        ),
        'OOP\\POLIMORFIZM\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../OOP/POLIMORFIZM',
        ),
        'OOP\\INTERFACE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../OOP/INTERFACE',
        ),
        'OOP\\HTML_TAGS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../OOP/HTML_TAGS',
        ),
        'OOP\\ABSTRACT\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../OOP/ABSTRACT',
        ),
        'METHOD_SERVER\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../METHOD_SERVER',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9a527b6bbe5a5412db87118a1b7c073e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9a527b6bbe5a5412db87118a1b7c073e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9a527b6bbe5a5412db87118a1b7c073e::$classMap;

        }, null, ClassLoader::class);
    }
}
