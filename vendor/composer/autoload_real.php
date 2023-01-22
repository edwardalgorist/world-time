<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite7a6985bdac380eb2f5b93efcdaa4e22
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

        spl_autoload_register(array('ComposerAutoloaderInite7a6985bdac380eb2f5b93efcdaa4e22', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite7a6985bdac380eb2f5b93efcdaa4e22', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite7a6985bdac380eb2f5b93efcdaa4e22::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
