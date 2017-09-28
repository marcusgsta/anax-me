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
// return [
//     "dsn"             => "mysql:host=blu-ray.student.bth.se;dbname=magi16;charset=utf8",
//     "username"        => "magi16",
//     "password"        => "sbyUAFRsRHn2",
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
$fileName = __DIR__ . "/../db/commentsystem.sqlite";
$dsn = "sqlite:$fileName";

return [
    // "dsn"             => "mysql:host=localhost;dbname=oophp;charset=utf8",
    "dsn"             => $dsn,
    // "username"        => "root",
    // "password"        => "sucker89",
    // "driver_options"  => null,
    // "fetch_mode"      => \PDO::FETCH_OBJ,
    // "table_prefix"    => null,
    // "session_key"     => "Anax\Database",

    // True to be very verbose during development
    // "verbose"         => null,

    // True to be verbose on connection failed
    // "debug_connect"   => false,
];
