<?php

// Credenciales cargadas desde variables de entorno. Nunca hardcodear passwords en el repo.
$dbHost = getenv('MYSQL_HOST')     ?: getenv('DB_HOST')     ?: 'localhost';
$dbName = getenv('MYSQL_DATABASE') ?: getenv('DB_NAME')     ?: 'aprendee_argentina';
$dbUser = getenv('MYSQL_USER')     ?: getenv('DB_USER')     ?: '';
$dbPass = getenv('MYSQL_PASSWORD') ?: getenv('DB_PASSWORD') ?: '';

return [
    'class'    => 'yii\db\Connection',
    'dsn'      => "mysql:host={$dbHost};dbname={$dbName}",
    'username' => $dbUser,
    'password' => $dbPass,
    'charset'  => 'utf8mb4',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
