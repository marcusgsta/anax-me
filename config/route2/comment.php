<?php
/**
 * Routes for the Comment System.
 */
return [
    "routes" => [
        [
            "info" => "Create a new item and add to the dataset.",
            "requestMethod" => "post",
            "path" => "post",
            // "path" => "{dataset:alphanum}",
            "callable" => ["commentController", "postItem"]
        ],

        [
            "info" => "Show a message that the route is unsupported, a local 404.",
            "requestMethod" => null,
            "path" => "**",
            "callable" => ["commentController", "anyUnsupported"]
        ],
    ]
];
