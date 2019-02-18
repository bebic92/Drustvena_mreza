<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd15ffa962ea23c419d2f0347974a3a06
{
    public static $classMap = array (
        'App\\Controllers\\AuthController' => __DIR__ . '/../..' . '/controllers/AuthController.php',
        'App\\Controllers\\PagesController' => __DIR__ . '/../..' . '/controllers/PagesController.php',
        'App\\Controllers\\PostsController' => __DIR__ . '/../..' . '/controllers/PostsController.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'App\\Core\\Database\\Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'App\\Core\\Database\\QueryBuilder' => __DIR__ . '/../..' . '/core/database/QueryBuilder.php',
        'App\\Core\\Filter' => __DIR__ . '/../..' . '/core/Filter.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'App\\Core\\Validation' => __DIR__ . '/../..' . '/core/Validation.php',
        'App\\Models\\Model' => __DIR__ . '/../..' . '/models/Model.php',
        'App\\Models\\Post' => __DIR__ . '/../..' . '/models/Post.php',
        'App\\Models\\User' => __DIR__ . '/../..' . '/models/User.php',
        'ComposerAutoloaderInitd15ffa962ea23c419d2f0347974a3a06' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitd15ffa962ea23c419d2f0347974a3a06' => __DIR__ . '/..' . '/composer/autoload_static.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitd15ffa962ea23c419d2f0347974a3a06::$classMap;

        }, null, ClassLoader::class);
    }
}
