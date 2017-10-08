<?php
/**
 * Config file for Database.
 *
 * Example for MySQL.
 *  "dsn" => "mysql:host=localhost;dbname=test;",
 *  "username" => "test",
 *  "password" => "test",
 *  "driver_options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
 *
 * Example for SQLite.
 *  "dsn" => "sqlite:memory::",
 *
 */

 $cred = require(__DIR__ . "/secrets.php");

// return [
//     "dsn"             => $cred['dsn'],
//     "username"        => $cred['user'],
//     "password"        => $cred['password'],
//     "driver_options"  => null,
//     "fetch_mode"      => \PDO::FETCH_OBJ,
//     "table_prefix"    => null,
//     "session_key"     => "Anax\Database",
//
//     // True to be very verbose during development
//     "verbose"         => null,
//
//     // True to be verbose on connection failed
//     "debug_connect"   => false,
// ];

// Create a DSN for the database using its filename
// $fileName = __DIR__ . "/../db/commentsystem.sqlite";
// $dsn = "sqlite:$fileName";
//
// return [
//     "dsn"             => $dsn,
// ];

// <?php
/**
 * Config file for Database.
 *
 * Example for MySQL.
 *  "dsn" => "mysql:host=localhost;dbname=test;",
 *  "username" => "test",
 *  "password" => "test",
 *  "driver_options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
 *
 * Example for SQLite.
 *  "dsn" => "sqlite:memory::",
 */
return [
    "dsn"             => "sqlite:" . ANAX_INSTALL_PATH . "/data/db.sqlite",
    "username"        => null,
    "password"        => null,
    "driver_options"  => null,
    "fetch_mode"      => \PDO::FETCH_OBJ,
    "table_prefix"    => null,
    "session_key"     => "Anax\Database",

    // True to be very verbose during development
    "verbose"         => null,

    // True to be verbose on connection failed
    "debug_connect"   => false,
];
