<?php

namespace Anax\App;

/**
 * An App class to wrap the resources of the framework.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class App
{
    public function redirect($url)
    {
        $this->response->redirect($this->url->create($url));
        exit;
    }



    /**
     * Render a standard web page using a specific layout.
     */
    public function renderPage($data, $status = 200)
    {
        $data["stylesheets"] = ["css/bootstrap.min.css",
                                "css/style.css",
                                "css/remserver.css"];

        $data["javascripts"] = ["js/jquery-3.2.1.slim.min.js", "js/popper.min.js", "js/bootstrap.min.js"];

        // Add common header, navbar and footer
        $this->view->add("take1/header", [], "header");
        $this->view->add("take1/navbar", [], "navbar");

        //$this->view->add("take1/edit-comment", [], "edit-comment");
        $this->view->add("take1/comment", [], "comment");

        $this->view->add("take1/footer", [], "footer");

        // Add layout, render it, add to response and send.
        $this->view->add("my_default/layout", $data, "layout");
        $body = $this->view->renderBuffered("layout");
        $this->response->setBody($body)
                       ->send($status);
        exit;
    }
}
