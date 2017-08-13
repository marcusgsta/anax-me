<?php

$app->router->add("test/test", function () use ($app) {
    $title = "Test";
    $app->view->add("test/test", [
        "title" => $title,
        "message" => "Detta är en test.",
    ]);
    $app->renderPage([
        "title" => $title,
    ], 403);
});
