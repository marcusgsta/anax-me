<?php
/**
 * Routes for the comment system.
 */

 /** Post a comment. */
$app->router->post("comment/post", [$app->commentController, "postItem"]);


 /** Update a comment. */
$app->router->get("comment/update/{id:digit}", [$app->commentController, "update"]);

//$app->router->add("api/**", [$app->remController, "anyPrepare"]);

/** Init or re-init the REM Server. */
//$app->router->get("api/init", [$app->remController, "anyInit"]);
