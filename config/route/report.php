<?php
/**
 * Routes for flat file content.
 */
$app->router->add("report", function () use ($app) {

    // Render a standard page using layout
    $app->view->add("default1/article", [
        // "navbar" =>
        "content" => $content->text
    ]);
    $app->renderPage($content->frontmatter);
});
