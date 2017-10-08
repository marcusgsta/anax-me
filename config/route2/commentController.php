<?php
/**
 * Routes for comment controller.
 */
return [
    "routes" => [
        // [
        //     "info" => "User Controller index.",
        //     "requestMethod" => "get",
        //     "path" => "",
        //     "callable" => ["userController", "getIndex"],
        // ],
        // [
        //     "info" => "Show user profile.",
        //     "requestMethod" => "get|post",
        //     "path" => "profile",
        //     "callable" => ["userController", "showProfile"],
        // ],
        [
            "info" => "Create a comment.",
            "requestMethod" => "get|post",
            "path" => "create",
            "callable" => ["commentController", "getPostCreateComment"],
        ],
        [
            "info" => "Edit a comment.",
            "requestMethod" => "get|post",
            // "path" => "edit",
            "path" => "edit/{dataset:alphanum}/{id:digit}",
            // "path" => "{dataset:alphanum}/{id:digit}",
            "callable" => ["commentController", "getPostEditComment"],
        ],
        [
            "info" => "Delete comments.",
            "requestMethod" => "get|post",
            "path" => "delete",
            "callable" => ["commentController", "deleteComment"],
        ],
    ]
];
