<?php
/**
 * Routes.
 */
require __DIR__ . "/route/internal.php";
require __DIR__ . "/route/debug.php";
require __DIR__ . "/route/flat-file-content.php";

//mý routes
require __DIR__ . "/route/test.php";


// Catch all route last
require __DIR__ . "/route/404.php";
