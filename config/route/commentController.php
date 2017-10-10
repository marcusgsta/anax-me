<?php
/**
 * Routes for comment controller.
 */
return [
    "mount" => "comment",
    "routes" => [
        [
            "info" => "Create a comment.",
            "requestMethod" => "get|post",
            "path" => "create",
            "callable" => ["commentController", "getPostCreateComment"],
        ],
        [
            "info" => "Edit a comment.",
            "requestMethod" => "get|post",
            "path" => "edit/{dataset:alphanum}/{id:digit}",
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
