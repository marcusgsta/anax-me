<?php
/**
 * Configuration file for DI container.
 */
return [
    // Services to add to the container.
    "services" => [
        "request" => [
            "shared" => true,
            "callback" => function () {
                $request = new \Anax\Request\Request();
                $request->init();
                return $request;
            }
        ],
        // "response" => [
        //     "shared" => true,
        //     "callback" => "\Anax\Response\Response",
        // ],
        "response" => [
            "shared" => true,
            //"callback" => "\Anax\Response\Response",
            "callback" => function () {
                $obj = new \Anax\Response\ResponseUtility();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "url" => [
            "shared" => true,
            "callback" => function () {
                $url = new \Anax\Url\Url();
                $request = $this->get("request");
                $url->setSiteUrl($request->getSiteUrl());
                $url->setBaseUrl($request->getBaseUrl());
                $url->setStaticSiteUrl($request->getSiteUrl());
                $url->setStaticBaseUrl($request->getBaseUrl());
                $url->setScriptName($request->getScriptName());
                $url->configure("url.php");
                $url->setDefaultsFromConfiguration();
                return $url;
            }
        ],
        "router" => [
            "shared" => true,
            "callback" => function () {
                $router = new \Anax\Route\Router();
                $router->setDI($this);
                $router->configure("route2.php");
                return $router;
            }
        ],
        "view" => [
            "shared" => true,
            "callback" => function () {
                $view = new \Anax\View\ViewCollection();
                $view->setDI($this);
                $view->configure("view.php");
                return $view;
            }
        ],
        "viewRenderFile" => [
            "shared" => true,
            "callback" => function () {
                $viewRender = new \Anax\View\ViewRenderFile2();
                $viewRender->setDI($this);
                return $viewRender;
            }
        ],
        "session" => [
            "shared" => true,
            "active" => true,
            "callback" => function () {
                $session = new \Anax\Session\SessionConfigurable();
                $session->configure("session.php");
                $session->start();
                return $session;
            }
        ],
        "textfilter" => [
            "shared" => true,
            "callback" => "\Anax\TextFilter\TextFilter",
        ],
        "pageRender" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Marcusgsta\Page\PageRender();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "errorController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Marcusgsta\Page\ErrorController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "debugController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Marcusgsta\Page\DebugController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "flatFileContentController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Marcusgsta\Page\FlatFileContentController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "rem" => [
            "shared" => true,
            "callback" => function () {
                $rem = new \Anax\RemServer\RemServer();
                $rem->configure("remserver.php");
                $rem->injectSession($this->get("session"));
                return $rem;
            }
        ],
        "remController" => [
            "shared" => true,
            "callback" => function () {
                $rem = new \Anax\RemServer\RemServerController();
                $rem->setDI($this);
                return $rem;
            }
        ],
        "database" => [
            "shared" => true,
            "callback" => function () {
                $connection = require("database.php");
                $db = new \Anax\Database\Database($connection);
                return $db;
            }
        ],
        "db" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Database\DatabaseQueryBuilder();
                $obj->configure("database.php");
                return $obj;
            }
        ],
        "commentController" => [
            "shared" => true,
            "callback" => function () {
                $comment = new \Marcusgsta\Comment\CommentController();
                $comment->setDI($this);
                return $comment;
            }
        ],
        "comment" => [
            "shared" => true,
            "callback" => function () {
                $comment = new \Marcusgsta\Comment\Comment();
                $comment->injectDatabase($this->get("database"));
                // $comment->setDI($this);
                return $comment;
            }
        ],
        "access" => [
            "shared" => true,
            "callback" => function () {
                $access = new \Marcusgsta\Access\Access();
                $access->injectDatabase($this->get("database"));

                return $access;
            }
        ],
        "accessController" => [
            "shared" => true,
            "callback" => function () {
                $access = new \Marcusgsta\Access\AccessController();
                $access->setDI($this);
                return $access;
            }
        ],
        "userController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\User\UserController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "bookController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Book\BookController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "logInController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\LogIn\LogInController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        // "logIn" => [
        //     "shared" => true,
        //     "callback" => function () {
        //         $obj = new \Anax\LogIn\LogIn();
        //         $obj->setDI($this);
        //         return $obj;
        //     }
        // ],
    ],
];
