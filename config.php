<?php

return [

    'database' => [
        'type' => 'mysql',
        'host' => 'localhost',
        'name' => 'social_network',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
        ]

];