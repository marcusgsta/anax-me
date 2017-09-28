<?php

namespace Marcusgsta\Comment;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * Comment.
 */
class CommentController implements AppInjectableInterface
{

    use AppInjectableTrait;


    /**
     * Destroy the session.
     *
     * @return void
     */
    public function anyDestroy()
    {
        $this->app->session->destroy();
        $this->app->response->sendJson(["message" => "The session was destroyed."]);
        //exit;
    }


    /**
     * Create a new item by getting the entry from the request body and add
     * to the dataset.
     *
     * @param string $key    for the dataset
     *
     * @return void
     */
    public function postItem($key)
    {
        $entry = $this->app->request->getBody();
        $entry = json_decode($entry, true);

        $item = $this->app->Comment->addItem($key, $entry);
        $this->app->response->sendJson($item);
        //exit;
    }


    /**
     *
     *
     * @param string $comment
     *
     * @return void
     */
    public function commentCheck()
    {
        //$this->app->session->destroy();

        if (isset($_POST['text'])) {
            $newComment = $_POST;
            $this->app->comment->saveComment($newComment);
        }

        if (isset($_GET['delete'])) {
            $commentArray = $_GET['key'];
            $id = $_GET['id'];
            $this->app->comment->deleteComment($commentArray, $id);
        }

        if (isset($_GET['edit'])) {
            $commentArray = $_GET['key'];
            $id = $_GET['id'];
            $htmlform = $this->app->comment->editComment($commentArray, $id);
            echo $htmlform;
        }

        if (isset($_POST['update'])) {
            $commentArray = $_POST['key'];
            $id = $_POST['id'];
            // $text = $_POST['text'];
            // echo "hej";
            // echo $commentArray;
            // echo $id;
            // echo $text;
            $this->app->comment->deleteComment($commentArray, $id);
        }
    }
}
