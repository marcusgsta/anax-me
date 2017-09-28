<?php
/**
 * Routes to handle access and users.
 */
return [
    "routes" => [
        // [
        //     "info" => "Display form.",
        //     "requestMethod" => "get",
        //     "path" => "post",
        //     // "path" => "{dataset:alphanum}",
        //     "callable" => ["accessController", "createUser"]
        // ],
        [
            "info" => "Create a new user and add to the database.",
            "requestMethod" => null,
            "path" => "create",
            // "path" => "{dataset:alphanum}",
            "callable" => ["accessController", "addUser"]
        ],
        [
            "info" => "Show a message that the route is unsupported, a local 404.",
            "requestMethod" => null,
            "path" => "**",
            "callable" => ["accessController", "anyUnsupported"]
        ],
    ]
];
