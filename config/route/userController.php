<?php
/**
 * Routes for user controller.
 */
return [
    "mount" => "user",
    "routes" => [
        [
            "info" => "User Controller index.",
            "requestMethod" => "get",
            "path" => "",
            "callable" => ["userController", "getIndex"],
        ],
        [
            "info" => "Login a user.",
            "requestMethod" => "get|post",
            "path" => "login",
            "callable" => ["userController", "getPostLogin"],
        ],
        [
            "info" => "Logout a user.",
            "requestMethod" => "get|post",
            "path" => "logout",
            "callable" => ["logInController", "logOut"],
        ],
        [
            "info" => "Show user profile.",
            "requestMethod" => "get|post",
            "path" => "profile",
            "callable" => ["userController", "showProfile"],
        ],
        [
            "info" => "Create a user.",
            "requestMethod" => "get|post",
            "path" => "create",
            "callable" => ["userController", "getPostCreateUser"],
        ],
        [
            "info" => "Edit all users.",
            "requestMethod" => "get|post",
            "path" => "edit-all",
            "callable" => ["userController", "editAllUsers"],
        ],
        [
            "info" => "Edit user.",
            "requestMethod" => "get|post",
            "path" => "edit/{id:digit}",
            "callable" => ["userController", "editOneUser"],
        ],
    ]
];
