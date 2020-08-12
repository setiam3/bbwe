<?php
return [
        'main' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;port=3306;dbname=selina;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8mb4',
        ],
        'chat_db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;port=3306;dbname=bbwe_chat;',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8mb4',
        ]
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
    //'dsn' => 'mysql:host=localhost;port=3306;dbname=selina;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
    // 'username' => 'root',
    // 'password' => 'root',
];