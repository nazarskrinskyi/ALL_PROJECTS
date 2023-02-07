<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9a527b6bbe5a5412db87118a1b7c073e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit9a527b6bbe5a5412db87118a1b7c073e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9a527b6bbe5a5412db87118a1b7c073e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9a527b6bbe5a5412db87118a1b7c073e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
