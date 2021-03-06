<?php
/**
 * Default route to create a 404, use if no else route matched.
 */
return [
    "routes" => [
        [
            "info" => "Catch all and send 404.",
            "requestMethod" => null,
            "path" => null,
            "sort" => 999,
            "callable" => ["errorController", "page404"],
        ],
    ]
];

/*
$app->router->always(function () use ($app) {
    throw new \Anax\Route\NotFoundException();
});
*/
