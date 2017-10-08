<?php
/**
 * Configuration file for routes.
 */
return [
    // Load these routefiles in order specified and optionally mount them
    // onto a base route.
    "routeFiles" => [
        [
            // These are for internal error handling and exceptions
            "mount" => null,
            "file" => __DIR__ . "/route2/internal.php",
        ],
        [
            // For debugging and development details on Anax
            "mount" => "debug",
            "file" => __DIR__ . "/route2/debug.php",
        ],
        [
            // remserver
            // "mount" => null,
            "mount" => "api",
            "file" => __DIR__ . "/route2/remserver.php",
        ],
        [
            // To read flat file content in Markdown from content/
            "mount" => null,
            "file" => __DIR__ . "/route2/flat-file-content.php",
        ],
        [
            // Posting comments
            "mount" => "comment",
            "file" => __DIR__ . "/route2/commentController.php",
        ],
        [
            // Access routes
            "mount" => "access",
            "file" => __DIR__ . "/route2/access.php",
        ],
        // [
        //     // For tests
        //     "mount" => "test_pdo_sqlite",
        //     "file" => __DIR__ . "/route2/test_pdo_sqlite.php",
        // ],
        [
            // Add routes from userController and mount on user/
            "mount" => "user",
            "file" => __DIR__ . "/route2/userController.php",
        ],
        [
            // Add routes from bookController and mount on book/
            "mount" => "book",
            "file" => __DIR__ . "/route2/bookController.php",
        ],
        [
            // Keep this last since its a catch all
            "mount" => null,
            "file" => __DIR__ . "/route2/404.php",
        ],
    ],

];
