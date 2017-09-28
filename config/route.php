<?php
/**
 * Routes.
 */
require __DIR__ . "/route/internal.php";
require __DIR__ . "/route/debug.php";

//mý routes
require __DIR__ . "/route/test.php";
//require __DIR__ . "/route/report.php";

// Remserver
require __DIR__ . "/route/remserver.php";

// Comment System
//require __DIR__ . "/route/comment.php";

require __DIR__ . "/route/flat-file-content.php";

// navbar
// require __DIR__ . "/route/navbar.php";

// Catch all route last
require __DIR__ . "/route/404.php";
