<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit347a3d282608bf561197e87d823bd911
{
    public static $files = array (
        '1cfd2761b63b0a29ed23657ea394cb2d' => __DIR__ . '/..' . '/topthink/think-captcha/src/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'think\\captcha\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'think\\captcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-captcha/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit347a3d282608bf561197e87d823bd911::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit347a3d282608bf561197e87d823bd911::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}