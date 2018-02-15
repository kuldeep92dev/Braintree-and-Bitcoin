<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit380c9848df038c80bbfcadaf6bf5d77b
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CoinGate\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CoinGate\\' => 
        array (
            0 => __DIR__ . '/..' . '/coingate/coingate-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit380c9848df038c80bbfcadaf6bf5d77b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit380c9848df038c80bbfcadaf6bf5d77b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
