<?php

return [
    'migration_dirs' => [
        'migrations' => __DIR__ . '/db/migrations',
    ],
    'environments' => [
        'local' => [
            'adapter' => 'mysql',
            'host' => 'db',
            'port' => 3306, // optional
            'username' => 'root',
            'password' => 'root',
            'db_name' => 'parkman',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci', // optional, if not set default collation for utf8mb4 is used
        ],
        'production' => [
            'adapter' => 'mysql',
            'host' => 'production_host',
            'port' => 3306, // optional
            'username' => 'user',
            'password' => 'pass',
            'db_name' => 'my_production_db',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci', // optional, if not set default collation for utf8mb4 is used
        ],
    ],
    'default_environment' => 'local',
    'log_table_name' => 'phoenix_log',
];