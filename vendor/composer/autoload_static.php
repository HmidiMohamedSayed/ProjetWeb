<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit67c47f5781972fcb429eaba44652f2dd
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit67c47f5781972fcb429eaba44652f2dd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit67c47f5781972fcb429eaba44652f2dd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit67c47f5781972fcb429eaba44652f2dd::$classMap;

        }, null, ClassLoader::class);
    }
}
