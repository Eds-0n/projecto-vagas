<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9461f7c60c52acbd9be6bd01cdfb1aba
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

        spl_autoload_register(array('ComposerAutoloaderInit9461f7c60c52acbd9be6bd01cdfb1aba', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9461f7c60c52acbd9be6bd01cdfb1aba', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9461f7c60c52acbd9be6bd01cdfb1aba::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
