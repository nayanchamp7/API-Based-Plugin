<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbd2ec382dfc66b1cfaf5f9e636bb068b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'ABP\\Library\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ABP\\Library\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbd2ec382dfc66b1cfaf5f9e636bb068b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbd2ec382dfc66b1cfaf5f9e636bb068b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}