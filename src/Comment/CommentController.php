<?php

namespace Marcusgsta\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \Marcusgsta\Comment\HTMLForm\EditCommentForm;
use \Marcusgsta\Comment\HTMLForm\CreateCommentForm;
use \Marcusgsta\Comment\HTMLForm\DeleteCommentForm;

/**
 * A controller class.
 */
class CommentController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;



    /**
     * @var $data description
     */
    //private $data;



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getComments()
    {
        // $title      = "A collection of items";
        // $view       = $this->di->get("view");
        // $pageRender = $this->di->get("pageRender");
        $route = $this->di->request->getRoute();

        $comment = new Comment();
        $comment->setDb($this->di->get("db"));

        $allComments = $comment->findAll();

        // filter array of comments to current page
        $newArray = array_filter($allComments, function ($obj) {
            $route = $this->di->request->getRoute();
            $route = empty($route) ? "index" : $route;

            if ($obj->page != $route) {
                return false;
            }
            return true;
        });

        $data = [
            // "items" => $comment->findAll(),
            "items" => $newArray,
        ];

        return $data;

        // $view->add("book/crud/view-all", $data);
        //
        // $pageRender->renderPage(["title" => $title]);
    }

    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getPostCreateComment()
    {
        $title      = "A create comment page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new CreateCommentForm($this->di);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
    }

    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getPostEditComment($key, $itemId)
    {
        $data = ["page" => $key, "commentid" => $itemId];

        $commentId = $data['commentid'];
        $loggedInUser = $this->di->session->get("user");
        $role = $this->getRole($loggedInUser);

        if ($role != 10) {
            if (!$this->isEditable($commentId, $loggedInUser)) {
                echo "Du har inte tillgång till att redigera denna kommentar.";
                return false;
            }
        }

        $title      = "An edit comment page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new EditCommentForm($this->di, $data);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
    }

    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function deleteComment()
    {
        $title      = "A delete comments page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new DeleteCommentForm($this->di);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
    }

    /**
    * get a user's role
    * @param string user's acronym
    *
    * @return integer user's role
    **/
    public function getRole($acronym)
    {
        $user = new \Anax\User\User();
        $user->setDb($this->di->get("db"));
        $user->find("acronym", $acronym);
        $role = isset($user->role) ? $user->role : null;
        return $role;
    }

    /**
    * check if logged in user can edit the comment
    * @param string commentid
    *
    * @return bool
    **/
    public function isEditable($commentId, $user)
    {
        $comment = new Comment;
        $comment->setDb($this->di->get("db"));
        $comment = $comment->find("id", $commentId);

        if ($comment) {
            if ($comment->acronym != $user) {
                return false;
            }
            return true;
        }
    }
}
